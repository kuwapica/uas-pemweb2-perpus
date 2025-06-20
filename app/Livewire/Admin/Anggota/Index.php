<?php

namespace App\Livewire\Admin\Anggota;

use App\Models\Anggota;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
#[Title(('Data Anggota'))]
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $idToDelete = null;

    public function destroy($id)
    {
        Anggota::destroy($id);
        // Alert::toast('Berhasil hapus data', 'success'); //karena ini sweetalert, bisa diinstal dulu
        session()->flash('success', 'Berhasil hapus data');
        $this->idToDelete = null;
        return $this->redirectRoute('admin.anggota', navigate: true);
    }

    public function render()
    {
        $dataAnggota = Anggota::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.admin.anggota.index', compact('dataAnggota'));
    }
}
