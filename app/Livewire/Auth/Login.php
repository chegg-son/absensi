<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username;
    public $password;

    public function login()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['username' => $this->username, 'password' => $this->password])) {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Login Sukses');
            return $this->redirectRoute('dashboard', navigate: true);
        } else {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->error('Login gagal');
            return $this->redirectRoute('login', navigate: true);
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
