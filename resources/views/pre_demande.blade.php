@extends('layouts.app')

@section('title', 'CNI Rendez-vous - Pré-demande')

@section('content')
<div class="bg-white">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Pré-demande CNI
            </h2>
            <p class="mt-4 text-lg text-gray-500">
                Remplissez ce formulaire pour commencer votre demande de CNI.
            </p>

            <form action="{{ route('precommande.recap') }}" method="POST" class="mt-8 space-y-6">
                @csrf
                
                <!-- Type de demande -->
                <div>
                    <label for="type_demande" class="block text-sm font-medium text-gray-700">
                        Type de demande
                    </label>
                    <select id="type_demande" name="type_demande" required
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md">
                        <option value="">Sélectionnez un type</option>
                        <option value="premiere">Première demande</option>
                        <option value="renouvellement">Renouvellement</option>
                        <option value="duplicata">Duplicata</option>
                    </select>
                </div>

                <!-- Informations personnelles -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Informations personnelles</h3>
                    
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" name="nom" id="nom" required
                                   class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        
                        <div>
                            <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
                            <input type="text" name="prenom" id="prenom" required
                                   class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="date_naissance" class="block text-sm font-medium text-gray-700">Date de naissance</label>
                            <input type="date" name="date_naissance" id="date_naissance" required
                                   class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        
                        <div>
                            <label for="lieu_naissance" class="block text-sm font-medium text-gray-700">Lieu de naissance</label>
                            <input type="text" name="lieu_naissance" id="lieu_naissance" required
                                   class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>

                <!-- Adresse -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Adresse</h3>
                    
                    <div>
                        <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse complète</label>
                        <input type="text" name="adresse" id="adresse" required
                               class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="ville" class="block text-sm font-medium text-gray-700">Ville</label>
                            <input type="text" name="ville" id="ville" required
                                   class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        
                        <div>
                            <label for="code_postal" class="block text-sm font-medium text-gray-700">Code postal</label>
                            <input type="text" name="code_postal" id="code_postal" required
                                   class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>

                <!-- Coordonnées -->
                <div class="space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">Coordonnées</h3>
                    
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                            <input type="tel" name="telephone" id="telephone" required
                                   class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" required
                                   class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>

                <!-- Centre de réception -->
                <div>
                    <label for="centre" class="block text-sm font-medium text-gray-700">
                        Centre de réception préféré
                    </label>
                    <select id="centre" name="centre" required
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md">
                        <option value="">Sélectionnez un centre</option>
                        <option value="centre1">Centre 1 - Ville principale</option>
                        <option value="centre2">Centre 2 - Quartier nord</option>
                        <option value="centre3">Centre 3 - Quartier sud</option>
                    </select>
                </div>

                <div class="pt-5">
                    <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Continuer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection