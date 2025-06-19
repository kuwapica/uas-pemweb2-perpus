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

            {{-- <a class="btn btn-dark mb-2" href="{{ route('anggota.tambah') }}" wire:navigate>Tambah Buku</a> --}}
            {{-- <input type="text" wire:model.live.debounce.300ms="search"
                placeholder="Cari buku berdasarkan judul atau penulis" class="form-control mb-4"> --}}
            <div class="card border-0 rounded shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">
                                    Judul Buku
                                </th>
                                <th scope="col">
                                    Nama Mahasiswa
                                </th>
                                <th scope="col">
                                    Tanggal Pinjam
                                </th>
                                <th scope="col">
                                    Tanggal Kembali
                                </th>
                                <th scope="col" style="width: 13%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($peminjaman as $item)
                                <tr>
                                    <td>
                                        {{ $item->buku->judul }}
                                    </td>
                                    <td>
                                        {{ $item->anggota->nama }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') }}
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y') ?? 'Belum dikembalikan' }}
                                    </td>
                                    <td>
                                        @if (!$item->tanggal_kembali)
                                            <a wire:click="kembalikanBuku({{ $item->id }})"
                                                onclick="return confirm('Yakin ingin mengembalikan buku ini?')"
                                                class="btn btn-sm btn-warning">
                                                Kembalikan
                                            </a>
                                        @else
                                            <span class="badge bg-success">Sudah dikembalikan</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Buku belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- {{ $dataAnggota->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
