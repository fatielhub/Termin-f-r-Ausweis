@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 200px);">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <div class="text-center mb-4">
            <i class="fas fa-user-shield fa-3x text-success mb-3"></i>
            <h2 class="h4">Connexion Administrateur</h2>
        </div>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope me-1"></i> Adresse Email
                </label>
                <input type="email" name="email" id="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">
                    <i class="fas fa-lock me-1"></i> Mot de passe
                </label>
                <input type="password" name="password" id="password" 
                    class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 form-check">
                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Se souvenir de moi</label>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="fas fa-sign-in-alt me-1"></i> Se connecter
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 