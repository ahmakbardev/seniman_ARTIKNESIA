<?php

namespace App\Livewire;

use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Subkategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileSeniman extends Component
{
    use WithFileUploads;

    public $user;
    public $subkategoriName;
    public $username;
    public $email;
    public $phone;
    public $bio;
    public $selectedProvince;
    public $selectedCity;
    public $provinces = [];
    public $cities = [];
    public $profile_pic;
    public $new_profile_pic;
    public $uploadSuccess = false;

    public function mount()
    {
        $this->user = Auth::user();
        $this->subkategoriName = Subkategori::find($this->user->subkategori)->nama;

        // Inisialisasi properti dengan data user
        $this->username = $this->user->username;
        $this->email = $this->user->email;
        $this->phone = $this->user->whatsapp;
        $this->bio = $this->user->deskripsi_diri;
        $this->profile_pic = $this->user->profile_pic;

        // Load provinces
        $this->provinces = Provinsi::all();

        // Parse alamat untuk province dan city
        $alamatParts = explode(', ', $this->user->alamat);
        if (count($alamatParts) == 2) {
            $this->selectedCity = $alamatParts[0];
            $this->selectedProvince = $alamatParts[1];
            $this->loadCities();
        }
    }

    public function loadCities()
    {
        if ($this->selectedProvince) {
            $this->cities = Kota::where('provinsi_id', $this->selectedProvince)->get();
        } else {
            $this->cities = [];
        }
    }

    public function updatedNewProfilePic()
    {
        $this->validate([
            'new_profile_pic' => 'image|max:1024', // 1MB Max
        ]);

        $this->profile_pic = $this->new_profile_pic->store('profile-pics', 'public');
        $this->user->profile_pic = $this->profile_pic;
        $this->user->save();

        $this->uploadSuccess = true;
        $this->reset('new_profile_pic');

        // Emit event untuk JavaScript
        $this->dispatch('profilePicUpdated');
    }

    public function submit()
    {
        // Simpan perubahan
        $this->user->username = $this->username;
        $this->user->email = $this->email;
        $this->user->whatsapp = $this->phone;
        $this->user->deskripsi_diri = $this->bio;
        $this->user->alamat = $this->selectedCity . ', ' . $this->selectedProvince;
        $this->user->save();
    }

    public function render()
    {
        return view('livewire.profile-seniman');
    }
}
