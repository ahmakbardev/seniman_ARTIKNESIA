<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $idOrEmail;
    public $password;

    protected $rules = [
        'idOrEmail' => 'required',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate([
            'idOrEmail' => 'required',
            'password' => 'required',
        ], [
            'idOrEmail.required' => 'ID Seniman/Email harus diisi.',
            'password.required' => 'Password harus diisi.',
        ]);
    
        $credentials = filter_var($this->idOrEmail, FILTER_VALIDATE_EMAIL)
            ? ['email' => $this->idOrEmail, 'password' => $this->password]
            : ['id_seniman' => $this->idOrEmail, 'password' => $this->password];
    
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/');
        } else {
            // Authentication failed...
            $this->addError('idOrEmail', 'Kombinasi ID Seniman/Email dan Password tidak valid.');
        }
    }
    

    public function render()
    {
        return view('livewire.login', ['locale' => app()->getLocale()]);
    }
}
