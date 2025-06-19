<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-white text-center border-0 pt-4 pb-3">
                    <h4 class="fw-bold mb-0">Daftar Keanggotaan</h4>
                </div>
                <div class="card-body p-4">
                    @if (session()->has('message'))
                        <div class="alert alert-danger rounded-3">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form wire:submit="register">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input wire:model="nama" type="text"
                                class="form-control rounded-3 @error('nama') is-invalid @enderror">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input wire:model="nim" type="text"
                                class="form-control rounded-3 @error('nim') is-invalid @enderror">
                            @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">Nomor HP</label>
                            <input wire:model="no_hp" type="text"
                                class="form-control rounded-3 @error('no_hp') is-invalid @enderror">
                            @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input wire:model="alamat" type="text"
                                class="form-control rounded-3 @error('alamat') is-invalid @enderror">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-grid pt-4 pb-1">
                            <button type="submit" class="btn btn-dark rounded-3 fw-bold">
                                Daftar
                            </button>
                        </div>
                        <div class="d-grid pt-2 pb-3">
                            <a class="btn btn-success rounded-3 fw-bold" href="{{ route('adminlogin') }}">
                                Masuk Sebagai Administrator
                            </a>
                        </div>
                        <div class="text-center">
                            <span>Sudah mendaftar keanggotaan?</span>
                            <a class="fw-bold text-dark" href="{{ route('login') }}">
                                Masuk
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
