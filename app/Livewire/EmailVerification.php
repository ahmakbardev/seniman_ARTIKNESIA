<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmailVerification extends Component
{
    public function mount()
    {
        // Cek apakah email sudah diverifikasi
        if (Auth::user()->email_verified_at) {
            // Email sudah diverifikasi, arahkan pengguna ke halaman yang sesuai
            return redirect('/', ['locale' => app()->getLocale()]);
        }
    }

    public function render()
    {
        return view('livewire.email-verification');
    }
}