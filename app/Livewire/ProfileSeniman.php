<?php

namespace App\Livewire;

use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Subkategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;

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
    public $errorMessage = '';

    public function mount()
    {
        $this->user = Auth::user();
        $this->subkategoriName = Subkategori::find($this->user->subkategori)->nama ?? 'Unknown';

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
        try {
            $this->validate([
                'new_profile_pic' => 'image|max:1024', // 1MB Max
            ]);

            $this->profile_pic = $this->new_profile_pic->store('profile-pics', 'public');
            $this->user->profile_pic = $this->profile_pic;
            $this->user->save();

            $this->uploadSuccess = true;
            $this->reset('new_profile_pic');

            // Emit event untuk JavaScript
            $this->dispatchBrowserEvent('profilePicUpdated');
        } catch (ValidationException $e) {
            $this->errorMessage = 'Failed to upload profile picture: ' . $e->getMessage();
        } catch (\Exception $e) {
            $this->errorMessage = 'An unexpected error occurred: ' . $e->getMessage();
        }
    }

    public function submit()
    {
        try {
            $this->validate([
                'username' => 'required|string|max:255|unique:users,username,' . $this->user->id,
                'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
                'phone' => 'nullable|string|max:15',
                'bio' => 'nullable|string',
                'selectedProvince' => 'required',
                'selectedCity' => 'required',
            ]);

            // Simpan perubahan
            $this->user->username = $this->username;
            $this->user->email = $this->email;
            $this->user->whatsapp = $this->phone;
            $this->user->deskripsi_diri = $this->bio;
            $this->user->alamat = $this->selectedCity . ', ' . $this->selectedProvince;
            $this->user->save();

            // Emit event untuk pengalihan ke profil
            $this->dispatch('profileUpdated');
        } catch (ValidationException $e) {
            $this->errorMessage = 'Failed to save profile: ' . $e->getMessage();
        } catch (\Exception $e) {
            $this->errorMessage = 'An unexpected error occurred: ' . $e->getMessage();
        }
    }


    public function render()
    {
        return view('livewire.profile-seniman', [
            'errorMessage' => $this->errorMessage,
        ]);
    }
}
