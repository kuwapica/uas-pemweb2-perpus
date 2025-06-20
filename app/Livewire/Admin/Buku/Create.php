<?php

namespace App\Livewire\Admin\Buku;

use App\Models\Rak;
use App\Models\Buku;
use Livewire\Component;
use App\Models\Kategori;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
#[Title(('Tambah Buku'))]
class Create extends Component
{
    public $judul;
    public $penulis;
    public $tahun_terbit;
    public $kategori_id;
    public $rak_id;
    public $listKategori = [];
    public $listRak = [];

    public function mount()
    {
        // Ambil semua kategori untuk dropdown
        $this->listKategori = Kategori::all();
        $this->listRak = Rak::all();
    }

    public function store()
    {
        $this->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,id',
            'rak_id' => 'required|exists:raks,id',
        ]);

        Buku::create([
            'judul' => $this->judul,
            'penulis' => $this->penulis,
            'tahun_terbit' => $this->tahun_terbit,
            'kategori_id' => $this->kategori_id,
            'rak_id' => $this->rak_id,
        ]);

        session()->flash('message', 'Buku berhasil ditambahkan');

        return $this->redirectRoute('admin.buku', navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.buku.create');
    }
}
