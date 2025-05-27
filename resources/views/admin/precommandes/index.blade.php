@extends('layouts.app')
@section('title', 'Gestion des précommandes')
@section('content')
<div class="container">
    <h2 class="mb-4">Précommandes reçues</h2>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Code suivi</th>
                <th>Nom</th>
                <th>Centre</th>
                <th>Date RDV</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($precommandes as $p)
            <tr>
                <td>{{ $p->code_suivi }}</td>
                <td>{{ $p->nom }} {{ $p->prenom }}</td>
                <td>{{ optional($p->centre)->nom }}</td>
                <td>{{ optional($p->creneau)->date }}</td>
                <td>{{ ucfirst($p->statut) }}</td>
                <td>
                    <a href="{{ route('admin.precommandes.show', $p->id) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $precommandes->links() }}
</div>
@endsection 