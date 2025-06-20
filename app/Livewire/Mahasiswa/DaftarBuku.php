<?php

namespace App\Livewire\Mahasiswa;

use App\Models\Buku;
use Livewire\Component;
use App\Models\Peminjaman;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.mahasiswa')]
#[Title(('Daftar Buku'))]
class DaftarBuku extends Component
{
    use WithPagination;

    public $bukuID;
    public $buku_id;
    public $anggota_id;
    public $tanggal_pinjam;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // properti untuk pencarian 
    public $sortField = 'created_at'; // kolom untuk sorting 
    public $sortDirection = 'desc'; //arah sorting 

    public function pinjam($buku_id)
    {
        $anggota = auth('mahasiswa')->user();

        if (!$anggota) {
            session()->flash('message', 'Anda belum login sebagai anggota.');
            return;
        }

        $activeCount = Peminjaman::where('anggota_id', $anggota->id)
            ->whereNull('tanggal_kembali')
            ->count();

        if ($activeCount >= 3) {
            session()->flash('message', 'Maksimal pinjam adalah 3 buku!');
            return;
        }

        $alreadyBorrowed = Peminjaman::where('anggota_id', $anggota->id)
            ->where('buku_id', $buku_id)
            ->whereNull('tanggal_kembali')
            ->exists();

        if ($alreadyBorrowed) {
            session()->flash('message', 'Anda sudah meminjam buku ini.');
            return;
        }

        Peminjaman::create([
            'buku_id' => $buku_id,
            'anggota_id' => $anggota->id,
            'tanggal_pinjam' => now(),
        ]);

        session()->flash('message', 'Buku berhasil dipinjam!');
    }


    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' :
                'asc'; // arah sorting 
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $dataBuku = Buku::when(
            $this->search,
            fn($q) =>
            $q->where('judul', 'like', '%' . $this->search . '%')
                ->orWhere('penulis', 'like', '%' . $this->search . '%')
        )->orderBy($this->sortField, $this->sortDirection)->paginate(10);
        return view('livewire.mahasiswa.daftar-buku', compact('dataBuku'));
    }
}
