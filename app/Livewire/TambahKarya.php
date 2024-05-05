<?php

namespace App\Livewire;

use App\Models\Karya;
use App\Models\Subkategori;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class TambahKarya extends Component
{
    use WithFileUploads;

    public $name;
    public $images;
    public $size_x;
    public $size_y;
    public $weight;
    public $material;
    public $philosophy;
    public $price;
    public $stock;
    public $category_id;
    public $subkategori;
    public $jenisKarya;
    public $maxPrice; // Declare maxPrice as a public property

    public function mount()
    {

        $data = Auth::user();
        $this->subkategori = $data['subkategori'];
        // Menetapkan nilai $category_id dengan nilai $subkategori
        $this->category_id = $this->subkategori;

        // Mendapatkan data user yang sedang login
        $user = Auth::user();
        // Memastikan subkategori adalah sebuah objek Subkategori
        if ($user->subkategori instanceof Subkategori) {
            // Jika ya, kita langsung gunakan objek tersebut
            $this->subkategori = $user->subkategori;
        } else {
            // Jika tidak, kita gunakan ID subkategori untuk mengambil objek dari database
            $this->subkategori = Subkategori::find($user->subkategori);
        }

        switch ($user->paket_id) {
            case 1:
                $this->maxPrice = 500000;
                break;
            case 2:
                $this->maxPrice = 10000000;
                break;
            case 3:
                $this->maxPrice = 50000000;
                break;
            default:
                // Handle case when paket_id is not 1, 2, or 3
                break;
        }


        // Mendapatkan nama jenis karya
        $jenisKarya = $this->subkategori->jenisKarya->nama ?? '';
        $this->jenisKarya = $jenisKarya;
    }


    // public function mount()
    // {
    //     // Mendapatkan data user yang sedang login
    //     $data = Auth::user();

    //     // Mengambil nilai subkategori dari data user
    //     $this->subkategori = $data['subkategori'];

    //     // Menetapkan nilai $category_id dengan nilai $subkategori
    //     $this->category_id = $this->subkategori;
    // }

    public function render()
    {
        // $subkategori = Auth::user()->subkategori;
        // Memeriksa lang yang digunakan
        // $lang = app()->getLocale();
        // dd($lang);
        $validationMessage = trans('tambah-karya/validation.size_x.required');
        // dd($validationMessage);




        return view('livewire.tambah-karya', ['maxPrice' => $this->maxPrice]);
    }


    public function tambahKarya()
    {
        // Mendapatkan data user yang sedang login
        $user = Auth::user();

        // Validasi input berdasarkan paket_id
        $maxPrice = null;
        switch ($user->paket_id) {
            case 1:
                $maxPrice = 500000;
                break;
            case 2:
                $maxPrice = 10000000;
                break;
            case 3:
                $maxPrice = 50000000;
                break;
            default:
                // Handle case when paket_id is not 1, 2, or 3
                break;
        }

        // Menghilangkan tanda baca dan huruf dari harga
        // $plainPrice = str_replace([ ' ','Rp', '.', ','], '', $this->price);

        // dd($this->price);

        $this->validate([
            'name' => 'required',
            'images' => 'required|array|min:1',
            'images.*' => 'image|max:10240', // Max 10MB per image
            'size_x' => 'required|integer',
            'size_y' => 'required|integer',
            'weight' => 'required|numeric',
            'material' => 'required|string',
            'philosophy' => 'required|string',
            'price' => ['required', 'numeric', "max:$maxPrice"], // Add max validation rule
            'stock' => 'required|integer',
            'category_id' => 'required',
        ], [
            'name.required' => trans('tambah-karya/validation.name.required', ['attribute' => __('tambah-karya.attributes.name')]),
            'images.required' => trans('tambah-karya/validation.images.required', ['attribute' => __('tambah-karya.attributes.images')]),
            'images.array' => trans('tambah-karya/validation.images.array', ['attribute' => __('tambah-karya.attributes.images')]),
            'images.min' => trans('tambah-karya/validation.min', ['attribute' => __('tambah-karya.attributes.images'), 'min' => 1]),
            'images.*.image' => trans('tambah-karya/validation.image', ['attribute' => __('tambah-karya.attributes.images')]),
            'images.*.max' => trans('tambah-karya/validation.max', ['attribute' => __('tambah-karya.attributes.images'), 'max' => 10240]),
            'size_x.required' => trans('tambah-karya/validation.size_x.required', ['attribute' => __('tambah-karya.attributes.size_x')]),
            'size_x.integer' => trans('tambah-karya/validation.integer', ['attribute' => __('tambah-karya.attributes.size_x')]),
            'size_y.required' => trans('tambah-karya/validation.size_y.required', ['attribute' => __('tambah-karya.attributes.size_y')]),
            'size_y.integer' => trans('tambah-karya/validation.integer', ['attribute' => __('tambah-karya.attributes.size_y')]),
            'weight.required' => trans('tambah-karya/validation.weight.required', ['attribute' => __('tambah-karya.attributes.weight')]),
            'weight.numeric' => trans('tambah-karya/validation.weight.numeric', ['attribute' => __('tambah-karya.attributes.weight')]),
            'material.required' => trans('tambah-karya/validation.material.required', ['attribute' => __('tambah-karya.attributes.material')]),
            'material.string' => trans('tambah-karya/validation.material.string', ['attribute' => __('tambah-karya.attributes.material')]),
            'philosophy.required' => trans('tambah-karya/validation.philosophy.required', ['attribute' => __('tambah-karya.attributes.philosophy')]),
            'philosophy.string' => trans('tambah-karya/validation.philosophy.string', ['attribute' => __('tambah-karya.attributes.philosophy')]),
            'price.required' => trans('tambah-karya/validation.price.required', ['attribute' => __('tambah-karya.attributes.price')]),
            'price.numeric' => trans('tambah-karya/validation.price.numeric', ['attribute' => __('tambah-karya.attributes.price')]),
            'price.max' => trans('tambah-karya/validation.max', ['attribute' => __('tambah-karya.attributes.price'), 'max' => 'Rp ' . number_format($maxPrice, 0, ',', '.')]),
            'stock.required' => trans('tambah-karya/validation.stock.required', ['attribute' => __('tambah-karya.attributes.stock')]),
            'stock.integer' => trans('tambah-karya/validation.stock.integer', ['attribute' => __('tambah-karya.attributes.stock')]),
            'category_id.required' => trans('tambah-karya/validation.required', ['attribute' => __('tambah-karya.attributes.category_id')]),
        ]);

        // Inisialisasi data untuk Karya
        $karyaData = [
            'name' => $this->name,
            'size_x' => $this->size_x,
            'size_y' => $this->size_y,
            'weight' => $this->weight,
            'material' => $this->material,
            'philosophy' => $this->philosophy,
            'price' => $this->price, // Menggunakan plain number untuk price
            'stock' => $this->stock,
            'category_id' => $this->category_id,
            'user_id' => $user->id, // Set user_id dari pengguna yang sedang login
            'status' => 'pending', // Set user_id dari pengguna yang sedang login
        ];

        // Simpan gambar ke storage dan dapatkan pathnya
        $imagePaths = [];
        foreach ($this->images as $image) {
            $imagePaths[] = $image->store('karya-images', 'public');
        }

        // Tambahkan path gambar ke dalam data Karya
        $karyaData['images'] = json_encode($imagePaths);

        // Buat karya baru dengan data yang sudah diinisialisasi
        Karya::create($karyaData);

        session()->flash('message', 'Karya berhasil ditambahkan.');

        return redirect()->route('dashboard.seniman', ['locale' => app()->getLocale()]);
    }
}
