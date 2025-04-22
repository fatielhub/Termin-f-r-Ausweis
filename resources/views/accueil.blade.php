<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - CNI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="text-white">

    <!-- Navbar -->
    <nav class="bg-green-800 p-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="text-white text-xl font-bold">
                <span>👩‍💻</span>
            </div>
            <!-- Menu -->
            <div class="flex space-x-8 items-center">
                <!-- Service Dropdown -->
                <div class="relative">
                    <button class="bg-green-800 text-white px-4 py-2 rounded-full font-semibold hover:bg-green-700">
                        Service
                    </button>
                    <!-- Dropdown Content -->
                    <div class="absolute hidden bg-white text-green-900 rounded shadow-lg mt-2 w-48" id="serviceDropdown">
                        <a href="{{ route('pre.demande.store') }}" class="block px-4 py-2 hover:bg-gray-100">Créer votre pré-demande</a>
                        <a href="{{ route('suivi.demande') }}" class="block px-4 py-2 hover:bg-gray-100">Suivre ou compléter votre demande</a>
                    </div>
                </div>

                <!-- FAQ -->
                <a href="{{ route('faq') }}" class="text-white hover:text-gray-400">FAQ</a>

                <!-- Language Switcher -->
                <div class="relative">
                    <button class="bg-transparent text-white px-4 py-2 rounded-full font-semibold hover:bg-green-700 transition-all">
                        Langue
                    </button>
                    <!-- Language Dropdown -->
                    <div class="absolute hidden bg-white text-green-900 rounded shadow-lg mt-2 w-32">
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Français</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">عربى</a>
                    </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="relative w-full h-screen bg-cover bg-center" style="background-image: url('/images/embleme-maroc.png')">
        <div class="flex flex-col items-center justify-center h-full space-y-6">
            <h1 class="text-4xl font-bold text-center text-green-700 mb-12">C.N.I</h1>
            <p class="max-w-2xl text-center text-lg text-white bg-green-800 bg-opacity-80 px-6 py-4 rounded-lg shadow-md">
                La Carte Nationale d’Identité Electronique (CNIE) est un nouveau titre identitaire hautement sécurisé, permettant à tout citoyen de bénéficier d'une identification sûre et fiable, et d‘un moyen d’accès simple et sécurisé aux services numériques.
            </p>
            
            

            <div class="flex space-x-8">
                <button onclick="window.location.href='{{ route('pre.demande.store') }}'" class="bg-white text-green-900 font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-gray-200">
                    Créer votre pré-demande
                </button>

                <button onclick="window.location.href='{{ route('suivi.demande') }}'" class="bg-white text-green-900 font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-gray-200">
                    Suivre ou compléter votre demande
                </button>
            </div>
        </div>
    </div>

    <script>
        // Toggle dropdown visibility on hover
        const serviceButton = document.querySelector('button.bg-green-800');
        const serviceDropdown = document.getElementById('serviceDropdown');

        serviceButton.addEventListener('mouseover', () => {
            serviceDropdown.classList.remove('hidden');
        });

        serviceButton.addEventListener('mouseout', () => {
            serviceDropdown.classList.add('hidden');
        });
    </script>

    <footer class="bg-green-950 text-gray-200 py-12">
        <div class="max-w-7xl mx-auto px-6">
          <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
            <!-- Plan du site -->
            <div>
              <h3 class="text-lg font-semibold text-white mb-4">Plan du site</h3>
              <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-green-400 transition">Informations pratiques</a></li>
                <li><a href="#" class="hover:text-green-400 transition">À qui s’adresser ?</a></li>
                <li><a href="#" class="hover:text-green-400 transition">F.A.Q</a></li>
              </ul>
            </div>
      
            <!-- CNIE -->
            <div>
              <h3 class="text-lg font-semibold text-white mb-4">Demande CNIE</h3>
              <ul class="space-y-2 text-sm">
                <li><a href="{{ route('pre.demande.store') }}" class="hover:text-green-400 transition">Créer votre pré-demande</a></li>
                <li><a href="{{ route('suivi.demande') }}" class="hover:text-green-400 transition">Suivre ou compléter votre demande</a></li>
              </ul>
            </div>
      
            <!-- Informations -->
            <div>
              <h3 class="text-lg font-semibold text-white mb-4">Informations</h3>
              <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:text-green-400 transition">Contact</a></li>
                <li><a href="#" class="hover:text-green-400 transition">Mentions légales</a></li>
                <li><a href="#" class="hover:text-green-400 transition">Politique de confidentialité</a></li>
              </ul>
            </div>
      
            <!-- Réseaux sociaux -->
            <div>
              <h3 class="text-lg font-semibold text-white mb-4">Suivez-nous</h3>
              <div class="flex space-x-4">
                <a href="#" class="hover:text-green-400 transition">Facebook</a>
                <a href="#" class="hover:text-green-400 transition">Twitter</a>
                <a href="#" class="hover:text-green-400 transition">Instagram</a>
              </div>
            </div>
          </div>
      
          <!-- Separator -->
          <div class="mt-10 border-t border-green-800 pt-6 text-center text-sm text-gray-400">
            © 2020 Direction Générale de la Sûreté Nationale. Tous droits réservés.
          </div>
        </div>
      </footer>
      

</body>
</html>



