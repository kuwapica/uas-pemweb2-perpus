<?php

namespace App\Livewire\Admin\Anggota;

use App\Models\Anggota;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title(('Tambah Anggota'))]
class Create extends Component
{
    public $nama;
    public $nim;
    public $alamat;
    public $no_hp;

    public function store()
    {
        $this->validate([
            'nama' => 'required|max:255',
            'nim' => [
                'required',
                'regex:/^[A-Za-z][0-9][A-Za-z][0-9]{6}$/',
                'unique:anggotas,nim'
            ],
            'alamat' => 'required|max:255',
            'no_hp' => 'required|regex:/^[0-9]{10,13}$/|unique:anggotas,no_hp',
        ], [
            'nim.regex' => 'Format NIM tidak sesuai. Contoh: A1B123456',
            'nim.unique' => 'NIM sudah terdaftar.',
            'no_hp.regex' => 'Nomor HP harus 10-13 digit angka.',
            'no_hp.unique' => 'Nomor HP sudah terdaftar',
        ]);

        Anggota::create([
            'nama' => $this->nama,
            'nim' => $this->nim,
            'no_hp' => $this->no_hp,
            'alamat' => $this->alamat,
        ]);

        session()->flash('Success', 'Anggota berhasil ditambahkan');

        return $this->redirectRoute('admin.anggota', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.anggota.create');
    }
}
