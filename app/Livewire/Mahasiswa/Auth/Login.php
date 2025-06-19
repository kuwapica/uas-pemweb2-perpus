<?php

namespace App\Livewire\Mahasiswa\Auth;

use session;
use App\Models\Anggota;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('components.layouts.auth')]
#[Title(('Masuk'))]
class Login extends Component
{
    public $nama = '';
    public $nim = '';

    public function login()
    {
        $this->validate([
            'nama' => 'required|max:255',
            'nim' => [
                'required',
                'regex:/^[A-Za-z][0-9][A-Za-z][0-9]{6}$/',
            ],
        ], [
            'nim.regex' => 'Format NIM tidak sesuai. Contoh: H1D023070',
        ]);

        $anggota = Anggota::where('nama', $this->nama)
            ->where('nim', $this->nim)
            ->first();

        if ($anggota) {
            auth()->guard('mahasiswa')->login($anggota);
            session()->regenerate();
            return redirect()->route('daftarbuku');
        }

        session()->flash('message', 'Nama atau NIM salah.');
    }

    public function render()
    {
        return view('livewire.mahasiswa.auth.login');
    }
}
