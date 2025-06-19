<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form wire:submit.prevent="update" enctype="multipart/formdata">
                        <div class="form-group mb-2">
                            <label class="col-md-2 col-form-label fw-bold" for="judul">Judul Buku</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                name="judul" id="judul" wire:model="judul" />
                            @if ($errors->has('judul'))
                                <div class="alert alert-danger mt-2">
                                    {{ $errors->first('judul') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label class="col-md-2 col-form-label fw-bold" for="penulis">Penulis</label>
                            <input type="text" class="form-control @error('penulis') is-invalid @enderror"
                                name="penulis" id="penulis" wire:model="penulis" />
                            @if ($errors->has('penulis'))
                                <div class="alert alert-danger mt-2">
                                    {{ $errors->first('penulis') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label class="col-md-2 col-form-label fw-bold" for="tahun_terbit">Tahun Terbit</label>
                            <input type="text" class="form-control @error('tahun_terbit') is-invalid @enderror"
                                name="tahun_terbit" id="tahun_terbit" wire:model="tahun_terbit" />
                            @if ($errors->has('tahun_terbit'))
                                <div class="alert alert-danger mt-2">
                                    {{ $errors->first('tahun_terbit') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label class="col-md-2 col-form-label fw-bold" for="kategori_id">Kategori</label>
                            <select class="form-control" wire:model="kategori_id">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($listKategori as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('kategori_id'))
                                <div class="alert alert-danger mt-2">
                                    {{ $errors->first('kategori_id') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-2 col-form-label fw-bold" for="rak_id">Rak</label>
                            <select class="form-control" wire:model="rak_id">
                                <option value="">-- Pilih Rak --</option>
                                @foreach ($listRak as $rak)
                                    <option value="{{ $rak->id }}">{{ $rak->kode_rak }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('rak_id'))
                                <div class="alert alert-danger mt-2">
                                    {{ $errors->first('rak_id') }}
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-dark text-white">Simpan</button>
                        <a href="{{ route('admin.buku') }}" class="btn btn-secondary text-white"
                            wire:navigate>Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
