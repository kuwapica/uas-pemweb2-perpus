<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">

            <!-- flash message -->
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <input type="text" wire:model.live.debounce.300ms="search"
                placeholder="Cari buku berdasarkan judul atau penulis" class="form-control mb-4">
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">
                                    <a href="#" wire:click.prevent="sortBy('judul')"
                                        class="text-white text-decoration-none">
                                        Judul Buku
                                    </a>
                                </th>
                                <th scope="col">
                                    <a href="#" wire:click.prevent="sortBy('penulis')"
                                        class="text-white text-decoration-none">
                                        Penulis
                                    </a>
                                </th>
                                <th scope="col">
                                    Tahun Terbit
                                </th>
                                <th scope="col">
                                    Kategori
                                </th>
                                <th scope="col">
                                    Lokasi Rak
                                </th>
                                <th scope="col" style="width: 13%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataBuku as $item)
                                <tr>
                                    <td>
                                        {{ $item->judul }}
                                    </td>
                                    <td>
                                        {{ $item->penulis }}
                                    </td>
                                    <td>
                                        {{ $item->tahun_terbit }}
                                    </td>
                                    <td>
                                        {{ $item->kategori->nama_kategori }}
                                    </td>
                                    <td>
                                        {{ $item->rak->lokasi }}
                                    </td>
                                    <td class="text-center">
                                        <a wire:click="pinjam({{ $item->id }})"
                                            wire:confirm="Apakah kamu yakin ingin meminjam buku ini?"
                                            class="btn btn-sm btn-success">Pinjam</a>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Buku belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $dataBuku->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
