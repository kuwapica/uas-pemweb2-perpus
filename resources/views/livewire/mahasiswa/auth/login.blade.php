<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-white text-center border-0 pt-4 pb-3">
                    <h4 class="fw-bold mb-0">Masuk</h4>
                </div>
                <div class="card-body p-4">
                    @if (session()->has('message'))
                        <div class="alert alert-danger rounded-3">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form wire:submit="login">
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
                        <div class="d-grid pt-4 pb-1">
                            <button type="submit" class="btn btn-dark rounded-3 fw-bold">
                                Masuk
                            </button>
                        </div>
                        <div class="d-grid pt-2 pb-3">
                            <a class="btn btn-success rounded-3 fw-bold" href="{{ route('adminlogin') }}">
                                Masuk Sebagai Administrator
                            </a>
                        </div>
                        <div class="text-center">
                            <span>Belum pernah mendaftar keanggotaan?</span>
                            <a class="fw-bold text-dark" href="{{ route('mahasiswadaftar') }}">
                                Daftar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-white text-center border-0 pt-4 pb-3">
                    <h4 class="fw-bold mb-0">Login</h4>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('mahasiswalogin') }}">
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email"
                                class="form-control rounded-3 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control rounded-3 @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-grid pt-4 pb-1">
                            <button type="submit" class="btn btn-dark rounded-3 fw-bold">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="d-grid pt-2 pb-3">
                            <a class="btn btn-success rounded-3 fw-bold" href="{{ route('adminlogin') }}">
                                Masuk Sebagai Administrator
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
