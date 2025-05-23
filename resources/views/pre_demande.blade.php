<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prise de Rendez-vous - CNIE</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-600 to-indigo-800 min-h-screen flex flex-col items-center justify-center text-white">

    <!-- Conteneur principal -->
    <div class="max-w-2xl w-full bg-white p-8 rounded-lg shadow-lg text-gray-900">
        <h1 class="text-2xl font-bold text-center mb-4">Type de demande</h1>
        <p class="text-center text-gray-600 mb-6">Veuillez sélectionner le type de votre demande</p>

        <!-- Options de demande -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Première demande -->
            <div class="p-4 bg-gray-100 rounded-lg text-center shadow-md">
                <img src="{{ asset('images/cnie_new.jpg')}}" alt="Première demande" class="mx-auto mb-4 w-32 h-32 object-cover rounded">
                <h2 class="text-lg font-semibold">Première demande de CNIE</h2>
                <p class="text-gray-600 text-sm mb-4">Demande initiale de la Carte Nationale d'Identité Électronique.</p>
                <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-300">Sélectionner</a>
            </div>

            <!-- Renouvellement -->
            <div class="p-4 bg-gray-100 rounded-lg text-center shadow-md">
                <img src="{{ asset('images/cnie_renew.jpg')}}" alt="Renouvellement de CNIE" class="mx-auto mb-4 w-32 h-32 object-cover rounded">
                <h2 class="text-lg font-semibold">Renouvellement de CNIE</h2>
                <p class="text-gray-600 text-sm mb-4">Renouvellement de votre carte en toute simplicité.</p>
                <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded transition duration-300">Sélectionner</a>
            </div>
        </div>

        <!-- Conditions -->
        <div class="mt-6 text-center">
            <input type="checkbox" id="terms" name="terms" class="mr-2">
            <label for="terms" class="text-gray-700">J'accepte les conditions d'utilisation *</label>
        </div>
    </div>

</body>
</html>