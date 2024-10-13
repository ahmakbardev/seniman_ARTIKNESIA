<?php

namespace App\Livewire;

use App\Models\JenisKarya;
use App\Models\Kota;
use App\Models\Paket;
use App\Models\Provinsi;
use App\Models\Subkategori;
use App\Models\User;
use Livewire\Component;

class RegisterForm extends Component
{
    public $email;
    public $alamat;
    public $provinsi;
    public $kota;
    public $paket;
    public $password;
    public $confirmPassword;

    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $showPassword = false;
    public $showConfirmPassword = false;
    public $pakets;
    public $selectedJenisKarya;
    public $selectedSubkategori;
    public $jenisKaryaOptions;
    public $subkategoriOptions = [];

    protected $listeners = ['jenisKaryaSelected', 'subkategoriSelected'];

    public function subkategoriSelected($selectedSubkategori)
    {
        $this->selectedSubkategori = $selectedSubkategori;
    }

    public function jenisKaryaSelected($selectedJenisKarya)
    {
        $this->selectedJenisKarya = $selectedJenisKarya;
    }


    public function mount()
    {
        $this->pakets = Paket::all();

        // Tangkap parameter paket dari URL
        if (request()->has('paket')) {
            $this->paket = request('paket');
        }

        // Load jenis karya options
        $this->jenisKaryaOptions = JenisKarya::all();
    }


    public function togglePasswordVisibility()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function toggleConfirmPasswordVisibility()
    {
        $this->showConfirmPassword = !$this->showConfirmPassword;
    }

    public function render()
    {
        $provinsis = Provinsi::all();
        // Ubah untuk mengambil kota berdasarkan id provinsi yang dipilih
        $kotas = $this->selectedProvinsi ? Kota::where('provinsi_id', $this->selectedProvinsi)->get() : [];

        return view('livewire.register-form', [
            'provinsis' => $provinsis,
            'kotas' => $kotas,
        ]);
    }

    // Tambahkan metode untuk mengambil daftar kota berdasarkan id provinsi yang dipilih
    public function updatedSelectedProvinsi($value)
    {
        $this->selectedKota = null;
    }

    public function submitForm()
    {
        // Perform validation
        $this->validate([
            'email' => 'required|email|unique:users,email',
            'alamat' => 'required',
            'paket' => 'required',
            'password' => 'required|min:8',
            'confirmPassword' => 'same:password',

        ]);

        // Save the form data to the session
        session()->put('registration_data', [
            'email' => $this->email,
            'alamat' => $this->alamat,
            'paket' => $this->paket,
            'password' => $this->password,
            'jenis_karya' => $this->selectedJenisKarya, // Include the selected jenis karya
            'subkategori' => $this->selectedSubkategori, // Include the selected subkategori
        ]);
        // dd(session('registration_data'));
        // Redirect to the payment confirmation page with the email as a parameter
        return redirect()->route('payment.confirmation', ['email' => $this->email, 'locale' => app()->getLocale()]);
    }
}
