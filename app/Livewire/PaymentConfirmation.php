<?php

namespace App\Livewire;

use App\Mail\NewUserNotification;
use App\Models\JenisKarya;
use App\Models\Paket;
use App\Models\Subkategori;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PaymentConfirmation extends Component
{
    use WithFileUploads;

    public $email;
    public $alamat;
    public $paket;
    public $password;
    public $jenis_karya;
    public $subkategori;
    public $confirmationImage;
    public $selectedSubkategori;
    public $subkategoriOptions = [];
    public $jenisKaryaNama;
    public $subkategoriNama;

    protected $rules = [
        'confirmationImage' => 'required|image|mimes:jpeg,png,jpg|max:5000', // Gambar dengan ekstensi jpg, png, atau jpeg, maksimum 5MB
    ];
    public function mount()
    {
        // Ambil data registrasi dari sesi
        $registrationData = Session::get('registration_data');

        // Jika data registrasi kosong, redirect ke '/'
        if (empty($registrationData)) {
            session()->flash('error', 'Data registrasi tidak ditemukan.');
            return redirect('/');
        }

        // Cek apakah email sudah ada di database
        $existingUser = User::where('email', $registrationData['email'])->first();
        if ($existingUser) {
            return redirect(url('/verify-email'));
        }

        // Set nilai atribut sesuai dengan data registrasi
        $this->email = $registrationData['email'] ?? null;
        $this->alamat = $registrationData['alamat'] ?? null;
        $this->paket = $registrationData['paket'] ?? null;
        $this->password = $registrationData['password'] ?? null;
        $this->jenis_karya = $registrationData['jenis_karya'] ?? null;
        $this->subkategori = $registrationData['subkategori'] ?? null;

        // Ambil nama jenis karya dan subkategori berdasarkan id
        $this->jenisKaryaNama = JenisKarya::find($this->jenis_karya)->nama ?? null;
        $this->subkategoriNama = Subkategori::find($this->subkategori)->nama ?? null;
    }


    public function submitConfirmation()
    {
        // Validasi
        $this->validate();

        // Simpan gambar konfirmasi pembayaran ke penyimpanan yang diinginkan
        $imagePath = $this->confirmationImage->store('konfirmasi_pemb', 'public');

        // Ambil paket dari database berdasarkan $this->paket
        $paket = Paket::find($this->paket);

        // Jika paket tidak ditemukan, beri pesan kesalahan
        if (!$paket) {
            session()->flash('error', 'Paket tidak ditemukan.');
            return;
        }

        // Generate id_seniman based on the specified format
        $idSeniman = $this->generateIdSeniman($paket);

        // Simpan data konfirmasi pembayaran ke dalam database atau lakukan tindakan lainnya
        $user = User::create([
            'email' => $this->email,
            'alamat' => $this->alamat,
            'role_id' => 3,
            'paket_id' => $paket->id,
            'jenis_karya' => $this->jenis_karya, // Tambahkan jenis karya yang dipilih
            'subkategori' => $this->subkategori, // Tambahkan subkategori yang dipilih
            'password' => bcrypt($this->password),
            'ss_pembayaran' => $imagePath, // Simpan path gambar konfirmasi pembayaran
            'id_seniman' => $idSeniman, // Assign generated id_seniman
        'status' => 'pending', // Assign generated id_seniman
        ]);

        // Login pengguna setelah konfirmasi pembayaran
        Auth::login($user);
        Mail::to(['artiknesia.id@gmail.com', 'ahmakbar.dev@gmail.com'])->send(new NewUserNotification());

        // Periksa apakah email pengguna sudah terverifikasi
        if (is_null($user->email_verified_at)) {
            // Jika belum terverifikasi, arahkan ke halaman verifikasi email
            return redirect()->route('verification.notice');
        } else {
            // Jika sudah terverifikasi, hapus data registrasi dari sesi
            Session::forget('registration_data');

            // Redirect ke halaman dashboard seniman
            return redirect('/', ['locale' => app()->getLocale()]);
        }
    }



    // Method to generate id_seniman based on the specified format
    private function generateIdSeniman($paket)
    {
        // Extract the first three letters of the paket name
        $paketInitials = strtoupper(substr($paket->nama, 0, 3));

        // Extract the first three letters of the jenis karya name
        $jenisKaryaInitials = strtoupper(substr($this->jenisKaryaNama, 0, 3));

        // Generate a unique number (3 digits)
        $uniqueNumber = mt_rand(100, 999);

        // Get the current month and year
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('y');

        // Combine the components to form id_seniman
        $idSeniman = "{$uniqueNumber}_{$paketInitials}{$jenisKaryaInitials}_{$month}{$year}";

        // dd($idSeniman);

        return $idSeniman;
    }




    public function render()
    {
        return view('livewire.payment-confirmation');
    }
}
