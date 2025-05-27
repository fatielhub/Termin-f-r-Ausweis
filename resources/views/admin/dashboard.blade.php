@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
<div class="container">
    <h2>Tableau de bord Administrateur</h2>
    <p>Bienvenue dans l'espace d'administration.</p>

    <h3>Actions rapides :</h3>
    <ul>
        <li><a href="{{ route('admin.precommandes.index') }}">Voir les précommandes</a></li>
        {{-- Add other quick links here --}}
    </ul>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Déconnexion</button>
    </form>
</div>
@endsection 