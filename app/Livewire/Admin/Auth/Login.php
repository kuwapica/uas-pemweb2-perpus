<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.auth')]
#[Title(('Login'))]
class Login extends Component
{
    public $email = '';
    public $password = '';

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $this->email,
            'password' => $this->password
        ])) {
            // regenerate session biar aman dari session fixation
            session()->regenerate();
            return redirect()->route('admin.buku');
        }

        // Kalau gagal login
        session()->flash('message', 'Email atau password salah.');
    }

    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}
