@extends('layouts.app')
@section('title', 'Connexion Administrateur — CNI Rendez-vous')

@section('content')
<div class="min-h-[calc(100vh-200px)] flex items-center justify-center py-12">
    <div class="w-full max-w-md px-4">

        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-emerald-600 to-teal-500 flex items-center justify-center mx-auto mb-5 shadow-xl shadow-emerald-200">
                <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <h1 class="text-2xl font-extrabold text-gray-900 mb-1">Espace Administrateur</h1>
            <p class="text-gray-500 text-sm">Connectez-vous pour gérer les demandes.</p>
        </div>

        {{-- Card --}}
        <div class="card">
            <div class="card-body">

                {{-- Errors --}}
                @if($errors->any())
                    <div class="alert-danger mb-6">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <div>
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}" autocomplete="off">
                    @csrf

                    {{-- Email --}}
                    <div class="form-group">
                        <label class="form-label" for="email">Adresse email</label>
                        <div class="input-icon-wrapper">
                            <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <input type="email" id="email" name="email"
                                   class="form-input pl-11 @error('email') ring-2 ring-red-400 border-red-300 @enderror"
                                   value="{{ old('email') }}"
                                   placeholder="admin@exemple.ma"
                                   required autofocus>
                        </div>
                        @error('email')<p class="form-error">{{ $message }}</p>@enderror
                    </div>

                    {{-- Password --}}
                    <div class="form-group">
                        <label class="form-label" for="password">Mot de passe</label>
                        <div class="input-icon-wrapper">
                            <svg class="input-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            <input type="password" id="password" name="password"
                                   class="form-input pl-11 @error('password') ring-2 ring-red-400 border-red-300 @enderror"
                                   placeholder="••••••••"
                                   required>
                        </div>
                        @error('password')<p class="form-error">{{ $message }}</p>@enderror
                    </div>

                    {{-- Remember me --}}
                    <div class="flex items-center justify-between mb-6">
                        <label class="form-check" for="remember">
                            <input type="checkbox" id="remember" name="remember" class="form-check-input">
                            <span class="form-check-label">Se souvenir de moi</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-full btn-lg">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                        Se connecter
                    </button>
                </form>
            </div>
        </div>

        <p class="text-center text-xs text-gray-400 mt-5">
            <a href="{{ route('home') }}" class="hover:text-emerald-600 transition-colors">← Retour à l'accueil</a>
        </p>
    </div>
</div>
@endsection