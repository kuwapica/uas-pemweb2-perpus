<?php

namespace App\Livewire\Admin\Buku;

use App\Models\Buku;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Console\View\Components\Alert;

#[Layout('layouts.app')]
#[Title(('Data Buku'))]
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // properti untuk pencarian 
    public $sortField = 'created_at'; // kolom untuk sorting 
    public $sortDirection = 'desc'; //arah sorting 
    public $idToDelete = null;
    protected $listeners = ['hapusBuku' => 'destroy'];

    public function destroy($id)
    {
        Buku::destroy($id);
        // Alert::toast('Berhasil hapus data', 'success'); //karena ini sweetalert, bisa diinstal dulu
        session()->flash('message', 'Berhasil hapus data');
        // $this->idToDelete = null;
        // return $this->redirectRoute('admin.buku', navigate: true);
        return redirect()->route('admin.buku');
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
        return view('livewire.admin.buku.index', compact('dataBuku'));
    }
}
