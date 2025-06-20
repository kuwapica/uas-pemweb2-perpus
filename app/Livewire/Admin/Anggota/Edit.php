<?php

namespace App\Livewire\Admin\Anggota;

use App\Models\Anggota;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
#[Title(('Edit Anggota'))]
class Edit extends Component
{
    public $anggotaID;
    public $nama;
    public $nim;
    public $alamat;
    public $no_hp;

    public function mount($id)
    {
        $anggota = Anggota::findOrFail($id);

        $this->anggotaID = $anggota->id;
        $this->nama = $anggota->nama;
        $this->nim = $anggota->nim;
        $this->alamat = $anggota->alamat;
        $this->no_hp = $anggota->no_hp;
    }

    public function update()
    {
        $anggota = Anggota::findOrFail($this->anggotaID);

        $this->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
        ]);

        if ($this->nim !== $anggota->nim) {
            $this->validate([
                'no_hp' => ['required|regex:/^[0-9]{10,13}$/|unique:anggotas,no_hp'],
                'nim' => [
                    'required',
                    'regex:/^[A-Za-z][0-9][A-Za-z][0-9]{6}$/',
                    'unique:anggotas,nim'
                ],
                [
                    'no_hp.regex' => 'Nomor HP harus 10-13 digit angka.',
                    'no_hp.unique' => 'Nomor HP sudah terdaftar',
                    'nim.regex' => 'Format NIM tidak sesuai. Contoh: A1B123456',
                    'nim.unique' => 'NIM sudah terdaftar.',
                ]
            ]);
        }

        $anggota->update([
            'nama' => $this->nama,
            'nim' => $this->nim,
            'no_hp' => $this->no_hp,
            'alamat' => $this->alamat,
        ]);

        session()->flash('message', 'Anggota berhasil diperbarui.');
        return redirect()->route('admin.anggota');
    }

    public function render()
    {
        return view('livewire.admin.anggota.edit');
    }
}
