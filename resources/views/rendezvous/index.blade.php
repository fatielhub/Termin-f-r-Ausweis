@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Liste des Rendez-vous</h1>
    <a href="{{ route('rendezvous.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4 inline-block">Prendre un rendez-vous</a>

    @if(session('success'))
        <div class="bg-green-200 text-green-700 p-2 rounded-md mb-4">{{ session('success') }}</div>
    @endif

    <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2">Nom</th>
                <th class="border border-gray-300 px-4 py-2">Prénom</th>
                <th class="border border-gray-300 px-4 py-2">Téléphone</th>
                <th class="border border-gray-300 px-4 py-2">Date</th>
                <th class="border border-gray-300 px-4 py-2">Heure</th>
                <th class="border border-gray-300 px-4 py-2">Centre</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rendezvous as $rdv)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $rdv->nom }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $rdv->prenom }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $rdv->telephone }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $rdv->date }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $rdv->heure }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $rdv->centre }}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('rendezvous.edit', $rdv->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded-md">Modifier</a>
                    <form action="{{ route('rendezvous.destroy', $rdv->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-2 py-1 rounded-md mt-2" onclick="return confirm('Supprimer ce rendez-vous ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection


