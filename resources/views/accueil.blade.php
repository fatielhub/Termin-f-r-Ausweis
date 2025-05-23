<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande de CNI</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/LOGO.png') }}" alt="logo" class="h-8 w-8">
            <div class="flex flex-col leading-tight">
                <h1 class="text-green-700 font-extrabold text-xl leading-tight">CNI Rendez-vous</h1>
                <p class="text-xs text-gray-500 italic">Service officiel</p>
            </div>
            </div>
            
<div class="space-x-6 flex items-center">
    <a href="{{ route('faq') }}" class="flex items-center text-sm text-gray-700 hover:text-green-600 gap-1 flex-col">
    <!-- Icon FAQ -->
    <svg class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.1 0-2 .9-2 2s.9 2 2 2m0 0c1.1 0 2 .9 2 2s-.9 2-2 2m0 0v.01M12 4c4.418 0 8 3.582 8 8s-3.582 8-8 8-8-3.582-8-8 3.582-8 8-8z" />
    </svg>
    FAQ
    <p class="text-xs text-gray-500 italic mt-1">Questions fréquentes</p>
</a>

<a href="{{ route('pre.demande.store') }}" class="flex items-center text-sm text-gray-700 hover:text-green-600 gap-1 flex-col">
        <!-- Icon Prendre rendez-vous -->
        <svg class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 19h14M5 15h14" />
        </svg>
        Prendre rendez-vous
        <p class="text-xs text-gray-500 italic mt-1">Réserver en ligne</p>
    </a>
    
<a href="{{ route('suivi.demande') }}" class="flex items-center text-sm text-gray-700 hover:text-green-600 gap-1 flex-col">        <!-- Icon Suivre ma demande -->
        <svg  class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h13v6M9 17l-5-5m0 0l5-5m-5 5h13" />
        </svg>
        Suivre ma demande
         <p class="text-xs text-gray-500 italic mt-1">Avec votre code</p>
    </a>
    <!-- Dropdown de langue -->
<div class="relative group">
    <button class="text-sm text-gray-700 hover:text-green-600 flex items-center gap-2">
        <!-- Icone Langue -->
         Langue
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    
    <!-- Liste déroulante -->
    <div class="absolute hidden group-hover:block bg-white border rounded shadow-md mt-2 w-32 z-50">
        <!-- Lien Français avec icône -->
        <a href="{{ route('langue.change', ['locale' => 'fr']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center gap-2">
            <!-- Icone Français (drapeau France) -->
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Flag_of_France.svg/1200px-Flag_of_France.svg.png" alt="Français" class="w-5 h-5 rounded-full">
            Français
        </a>
        
        <!-- Lien Arabe avec icône -->
        <a href="{{ route('langue.change', ['locale' => 'ar']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center gap-2">
            <!-- Icone Arabe (drapeau arabe) -->
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Arab_League.svg/800px-Flag_of_Arab_League.svg.png" alt="العربية" class="w-5 h-5 rounded-full">
            العربية
        </a>
    </div>
</div>

</div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="bg-gradient-to-r from-green-100 via-white to-green-100 py-16">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h1 class="text-green-700 font-extrabold text-xl leading-tight">La Carte Nationale d’Identité Electronique (CNIE)</h1>
                <p class="text-md mb-6">Un nouveau titre identitaire hautement sécurisé, permettant à tout citoyen de bénéficier d'une identification sûre et fiable, et d‘un moyen d’accès simple et sécurisé aux services numériques.</p>
            <!-- Assurez-vous d'inclure la bibliothèque Font Awesome dans le <head> de votre HTML -->
<head>
</head>

<div class="flex gap-6">
    <!-- Bouton Prendre rendez-vous -->
    <a href="#" class="flex items-center justify-center bg-green-600 text-white text-sm px-6 py-3 rounded-md hover:bg-green-700 transition duration-300 ease-in-out transform hover:scale-105">
        <i class="fas fa-calendar-check mr-2 text-lg"></i>
        Prendre rendez-vous
    </a>

    <!-- Bouton Suivre ma demande -->
    <a href="#" class="flex items-center justify-center border border-green-600 text-green-700 text-sm px-6 py-3 rounded-md hover:bg-green-50 transition duration-300 ease-in-out transform hover:scale-105">
        <i class="fas fa-search mr-2 text-lg"></i>
        Suivre ma demande
    </a>
</div>

            </div>
           <div class="md:w-1/2 flex flex-col items-center md:items-end">
    <!-- Container Flip -->
    <div class="relative w-full md:w-96 perspective">
        <div class="relative w-full h-64 transition-transform duration-700 transform-style preserve-3d hover:rotate-y-180">

            <!-- Front image -->
            <div class="absolute w-full h-full backface-hidden">
                <img src="{{ asset('images/carte.jpg') }}" 
                     alt="illustration" 
                     class="rounded-3xl shadow-xl object-cover w-full h-full border-4 border-white">
            </div>
        </div>

     
        
    </svg>
    
    
</div>

    </div>
</div>

        </div>
    </section>

   <!-- Comment ça marche -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-green-800 mb-12">Comment ça marche ?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Étape 1 -->
            <div class="bg-white shadow-md rounded-lg p-6 text-center hover:shadow-xl transition">
                <div class="mx-auto w-16 h-16 flex items-center justify-center bg-green-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 20h9"></path>
                        <path d="M16 16v4"></path>
                        <path d="M12 4v16"></path>
                        <path d="M8 16v4"></path>
                        <path d="M3 20h9"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-green-700 mb-2">1. Remplir les informations</h3>
                <p class="text-sm text-gray-600">Entrez vos informations personnelles et choisissez le service souhaité.</p>
            </div>

            <!-- Étape 2 -->
            <div class="bg-white shadow-md rounded-lg p-6 text-center hover:shadow-xl transition">
                <div class="mx-auto w-16 h-16 flex items-center justify-center bg-green-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M8 7V3H16V7"></path>
                        <rect x="3" y="7" width="18" height="14" rx="2" ry="2"></rect>
                        <path d="M16 13H8"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-green-700 mb-2">2. Choisir un rendez-vous</h3>
                <p class="text-sm text-gray-600">Sélectionnez la date et l’heure dans la liste des créneaux disponibles.</p>
            </div>

            <!-- Étape 3 -->
            <div class="bg-white shadow-md rounded-lg p-6 text-center hover:shadow-xl transition">
                <div class="mx-auto w-16 h-16 flex items-center justify-center bg-green-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M15 12H9"></path>
                        <path d="M12 15V9"></path>
                        <circle cx="12" cy="12" r="10"></circle>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-green-700 mb-2">3. Suivre votre demande</h3>
                <p class="text-sm text-gray-600">Avec votre numéro de dossier, suivez l’état de votre demande.</p>
            </div>
        </div>
    </div>
</section>
<!-- Call to Action -->
<section class="bg-green-600 py-12 rounded-xl shadow-lg mb-16">
    <div class="max-w-lg mx-auto text-center text-white">
        <h3 class="text-3xl font-semibold mb-4">Prêt à commencer ?</h3>
        <p class="text-md mb-6">Réservez votre rendez-vous en ligne rapidement pour faciliter vos démarches administratives.</p>
        <a href="#" class="inline-block bg-white text-green-600 font-medium py-3 px-10 rounded-full shadow-md transform transition-all duration-300 hover:bg-green-50 hover:scale-105 hover:shadow-xl">
            Prendre rendez-vous
        </a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-green-50 py-10">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4 text-sm text-gray-700">
        <div>
            <h4 class="font-semibold text-green-800 mb-2">CNI Rendez-vous</h4>
            <p>Service de prise de rendez-vous en ligne pour la Carte Nationale d’Identité.</p>
        </div>
        <div>
            <h4 class="font-semibold text-green-800 mb-2">Liens Rapides</h4>
            <ul class="space-y-1">
                <li><a href="#" class="hover:text-green-600">Accueil</a></li>
                <li><a href="#" class="hover:text-green-600">Prendre rendez-vous</a></li>
                <li><a href="#" class="hover:text-green-600">Suivre ma demande</a></li>
                <li><a href="#" class="hover:text-green-600">Informations utiles</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-semibold text-green-800 mb-2">Contact</h4>
            <ul class="space-y-2 text-sm">
                <li class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2A19.86 19.86 0 0 1 3 5.18 2 2 0 0 1 5 3h3a2 2 0 0 1 2 1.72 13 13 0 0 0 .57 2.62 2 2 0 0 1-.45 2.11L9 10a16 16 0 0 0 5 5l1.55-1.13a2 2 0 0 1 2.11-.45 13 13 0 0 0 2.62.57A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    <span>+212 5XX-XXXXXX</span>
                </li>
                <li class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 4h16v16H4z" stroke="none"></path>
                        <path d="M22 6l-10 7L2 6"></path>
                    </svg>
                    <span>contact@cnirendezvous.ma</span>
                </li>
                <li class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 16v-1"></path>
                        <path d="M12 12V8"></path>
                    </svg>
                    <span>Comment ça marche ?</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="text-center text-xs mt-8 text-gray-500">© 2025 CNI Rendez-vous. Tous droits réservés.</div>
</footer>

</body>
</html>
