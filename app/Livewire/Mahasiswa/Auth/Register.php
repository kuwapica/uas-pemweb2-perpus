<?php

namespace App\Livewire\Mahasiswa\Auth;

use App\Models\Anggota;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth')]
#[Title(('Daftar'))]
class Register extends Component
{
    public $nama;
    public $nim;
    public $no_hp;
    public $alamat;

    public function register()
    {
        $this->validate([
            'nama' => 'required|max:255',
            'nim' => [
                'required',
                'regex:/^[A-Za-z][0-9][A-Za-z][0-9]{6}$/',
                'unique:anggotas,nim'
            ],
            'alamat' => 'required|max:255',
            'no_hp' => 'required|regex:/^[0-9]{10,13}$/',
        ], [
            'nim.regex' => 'Format NIM tidak sesuai. Contoh: A1B123456',
            'nim.unique' => 'NIM sudah terdaftar.',
            'no_hp.regex' => 'Nomor HP harus 10-13 digit angka.',
        ]);

        $anggota = Anggota::create([
            'nama' => $this->nama,
            'nim' => $this->nim,
            'no_hp' => $this->no_hp,
            'alamat' => $this->alamat,
        ]);

        auth()->guard('mahasiswa')->login($anggota);
        session()->regenerate();

        return redirect()->route('daftarbuku');
    }

    public function render()
    {
        return view('livewire.mahasiswa.auth.register');
    }
}
