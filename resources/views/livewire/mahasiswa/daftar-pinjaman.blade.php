<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">

            <!-- flash message -->
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            {{-- <input type="text" wire:model.live.debounce.300ms="search"
                placeholder="Cari buku berdasarkan judul atau penulis" class="form-control mb-4"> --}}
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Judul</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($peminjaman as $item)
                                <tr>
                                    <td>{{ $item->buku->judul }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') }}</td>
                                    <td>
                                        @if ($item->tanggal_kembali)
                                            {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y') }}
                                        @else
                                            <span class="text-danger">Belum dikembalikan</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!$item->tanggal_kembali)
                                            <a wire:click="kembalikanBuku({{ $item->id }})"
                                                wire:confirm="Apakah kamu yakin ingin mengembalikan buku ini?"
                                                class="btn btn-sm btn-warning">
                                                Kembalikan
                                            </a>
                                        @else
                                            <button class="btn btn-sm btn-secondary" disabled>
                                                Sudah dikembalikan
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada buku yang dipinjam.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- {{ $dataBuku->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
