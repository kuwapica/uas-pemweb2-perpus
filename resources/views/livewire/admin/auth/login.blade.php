<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-white text-center border-0 pt-4 pb-3">
                    <h4 class="fw-bold mb-0">Login</h4>
                </div>
                <div class="card-body p-4">
                    @if (session()->has('message'))
                        <div class="alert alert-danger rounded-3">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form wire:submit="login">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input wire:model="email" type="email"
                                class="form-control rounded-3 @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input wire:model="password" type="password"
                                class="form-control rounded-3 @error('password') is-invalid @enderror">
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
                            <a class="btn btn-success rounded-3 fw-bold" href="{{ route('login') }}">
                                Masuk Sebagai Mahasiswa
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
