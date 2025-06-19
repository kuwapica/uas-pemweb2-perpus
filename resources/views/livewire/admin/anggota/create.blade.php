<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form wire:submit.prevent="store" enctype="multipart/formdata">
                        <div class="form-group mb-2">
                            <label class="col-md-2 col-form-label fw-bold" for="nama">Nama Mahasiswa</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                name="nama" id="nama" placeholder="Nama Mahasiswa" wire:model="nama" />
                            @if ($errors->has('nama'))
                                <div class="alert alert-danger mt-2">
                                    {{ $errors->first('nama') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label class="col-md-2 col-form-label fw-bold" for="nim">NIM</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim"
                                id="nim" placeholder="NIM" wire:model="nim" />
                            @if ($errors->has('nim'))
                                <div class="alert alert-danger mt-2">
                                    {{ $errors->first('nim') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label class="col-md-2 col-form-label fw-bold" for="alamat">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                name="alamat" id="alamat" placeholder="Alamat Mahasiswa" wire:model="alamat" />
                            @if ($errors->has('alamat'))
                                <div class="alert alert-danger mt-2">
                                    {{ $errors->first('alamat') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group mb-2">
                            <label class="col-md-2 col-form-label fw-bold" for="no_hp">Nomor HP</label>
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                name="no_hp" id="no_hp" placeholder="Nomor HP" wire:model="no_hp" />
                            @if ($errors->has('no_hp'))
                                <div class="alert alert-danger mt-2">
                                    {{ $errors->first('no_hp') }}
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-dark text-white">Simpan</button>
                        <a href="{{ route('admin.anggota') }}" class="btn btn-secondary text-white"
                            wire:navigate>Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
