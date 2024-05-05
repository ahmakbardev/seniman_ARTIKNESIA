<?php

namespace App\Livewire;

use App\Models\Subkategori;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileSeniman extends Component
{
    public $user;
    public $subkategoriName;
    public $isEditing = false; // Tambahkan variabel isEditing
    public $username; // Tambahkan variabel untuk menyimpan username yang diedit
    public $deskripsiDiri; // Tambahkan variabel untuk menyimpan deskripsi diri yang diedit
    public $alamat; // Tambahkan variabel untuk menyimpan alamat yang diedit

    public function mount()
    {
        $this->user = Auth::user();
        $this->subkategoriName = Subkategori::find($this->user->subkategori)->nama;
    }

    public function render()
    {
        return view('livewire.profile-seniman');
    }

    public function edit()
    {
        $this->isEditing = true;
        $this->username = $this->user->username;
        $this->deskripsiDiri = $this->user->deskripsi_diri;
        $this->alamat = $this->user->alamat;
    }

    public function submit()
    {
        // Lakukan validasi jika diperlukan
        // Simpan perubahan
        $this->user->username = $this->username;
        $this->user->deskripsi_diri = $this->deskripsiDiri;
        $this->user->alamat = $this->alamat;
        $this->user->save();

        // Set isEditing kembali ke false untuk kembali ke mode tampilan normal
        $this->isEditing = false;
    }
    public function cancel()
    {
        $this->isEditing = false;
    }
}
