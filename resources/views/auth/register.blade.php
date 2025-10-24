@extends('layouts.auth')

@section('title', 'Daftar Akun')

@section('content')
<div class="auth-card">
    <div class="auth-logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" onerror="this.src='https://via.placeholder.com/150?text=Logo';">
        <h4 class="auth-title">Buat Akun Baru</h4>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input id="password" type="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       name="password" required autocomplete="new-password">
                <button class="btn btn-outline-secondary toggle-password" type="button">
                    <i class="fas fa-eye"></i>
                </button>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <small class="form-text text-muted">Minimal 8 karakter</small>
        </div>

        <div class="mb-4">
            <label for="password-confirm" class="form-label">Konfirmasi Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input id="password-confirm" type="password" class="form-control" 
                       name="password_confirmation" required autocomplete="new-password">
                <button class="btn btn-outline-secondary toggle-password" type="button">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-user-plus me-2"></i> Daftar Sekarang
            </button>
        </div>

        <div class="auth-footer">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk disini</a>
        </div>
    </form>
</div>

<script>
// Toggle password visibility
const togglePassword = document.querySelectorAll('.toggle-password');
togglePassword.forEach(button => {
    button.addEventListener('click', function() {
        const input = this.previousElementSibling;
        const icon = this.querySelector('i');
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
});
</script>
@endsection
