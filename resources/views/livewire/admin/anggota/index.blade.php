<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">

            <!-- flash message -->
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <!-- end flash message -->

            <a class="btn btn-dark mb-2" href="/anggota/tambah" wire:navigate>Tambah Anggota</a>
            {{-- <input type="text" wire:model.live.debounce.300ms="search"
                placeholder="Cari buku berdasarkan judul atau penulis" class="form-control mb-4"> --}}
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">
                                    Nama Mahasiswa
                                </th>
                                <th scope="col">
                                    NIM
                                </th>
                                <th scope="col">
                                    Alamat
                                </th>
                                <th scope="col">
                                    Nomor HP
                                </th>
                                <th scope="col" style="width: 13%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataAnggota as $item)
                                <tr>
                                    <td>
                                        {{ $item->nama }}
                                    </td>
                                    <td>
                                        {{ $item->nim }}
                                    </td>
                                    <td>
                                        {{ $item->alamat }}
                                    </td>
                                    <td>
                                        {{ $item->no_hp }}
                                    </td>
                                    <td class="text-center">
                                        <a href="anggota/edit/{{ $item->id }}" wire:navigate
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <button wire:click="destroy({{ $item->id }})" class="btn btn-sm btn-danger"
                                            wire:confirm="Are you sure you want to delete this post?">Hapus</button>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Buku belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $dataAnggota->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
