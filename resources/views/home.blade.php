<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('messages.hero.title') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @if(app()->getLocale() == 'ar')
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
    @endif
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/LOGO.png') }}" alt="logo" class="h-8 w-8">
                <div class="flex flex-col leading-tight">
                    <h1 class="text-green-700 font-extrabold text-xl leading-tight">CNI Rendez-vous</h1>
                    <p class="text-xs text-gray-500 italic">{{ __('messages.nav.appointment_subtitle') }}</p>
                </div>
            </div>
            
            <div class="space-x-6 flex items-center">
                <a href="{{ route('faq') }}" class="flex items-center text-sm text-gray-700 hover:text-green-600 gap-1 flex-col">
                    <i class="fas fa-question-circle text-green-600 text-lg"></i>
                    {{ __('messages.nav.faq') }}
                    <p class="text-xs text-gray-500 italic mt-1">{{ __('messages.nav.faq_subtitle') }}</p>
                </a>

                <a href="{{ route('precommande.type') }}" class="flex items-center text-sm text-gray-700 hover:text-green-600 gap-1 flex-col">
                    <i class="fas fa-calendar-plus text-green-600 text-lg"></i>
                    {{ __('messages.nav.appointment') }}
                    <p class="text-xs text-gray-500 italic mt-1">{{ __('messages.nav.appointment_subtitle') }}</p>
                </a>
                
                <a href="{{ route('precommande.suivi') }}" class="flex items-center text-sm text-gray-700 hover:text-green-600 gap-1 flex-col">
                    <i class="fas fa-search text-green-600 text-lg"></i>
                    {{ __('messages.nav.track') }}
                    <p class="text-xs text-gray-500 italic mt-1">{{ __('messages.nav.track_subtitle') }}</p>
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="bg-gradient-to-r from-green-100 via-white to-green-100 py-16">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h1 class="text-green-700 font-extrabold text-4xl leading-tight mb-6">{{ __('messages.hero.title') }}</h1>
                <p class="text-lg text-gray-600 mb-8">{{ __('messages.hero.description') }}</p>
                
                <div class="flex gap-6">
                    <a href="{{ route('precommande.type') }}" class="flex items-center justify-center bg-green-600 text-white text-sm px-6 py-3 rounded-md hover:bg-green-700 transition duration-300 ease-in-out transform hover:scale-105">
                        <i class="fas fa-calendar-check mr-2 text-lg"></i>
                        {{ __('messages.hero.appointment_button') }}
                    </a>

                    <a href="{{ route('precommande.suivi') }}" class="flex items-center justify-center border border-green-600 text-green-700 text-sm px-6 py-3 rounded-md hover:bg-green-50 transition duration-300 ease-in-out transform hover:scale-105">
                        <i class="fas fa-search mr-2 text-lg"></i>
                        {{ __('messages.hero.track_button') }}
                    </a>
                </div>
            </div>
            
            <div class="md:w-1/2 flex flex-col items-center md:items-end">
                <div class="relative w-full md:w-96">
                    <img src="{{ asset('images/carte.jpg') }}" alt="CNIE" class="rounded-3xl shadow-xl object-cover w-full h-full border-4 border-white">
                    <div class="absolute -top-4 -left-4">
                        <div class="bg-green-600 text-white p-3 rounded-full shadow-lg">
                            <i class="fas fa-shield-alt text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comment ça marche -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-green-800 mb-12">{{ __('messages.how_it_works.title') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Étape 1 -->
                <div class="bg-white shadow-md rounded-lg p-6 text-center hover:shadow-xl transition">
                    <div class="mx-auto w-16 h-16 flex items-center justify-center bg-green-100 rounded-full mb-4">
                        <i class="fas fa-user-edit text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-green-700 mb-2">{{ __('messages.how_it_works.step1.title') }}</h3>
                    <p class="text-sm text-gray-600">{{ __('messages.how_it_works.step1.description') }}</p>
                </div>

                <!-- Étape 2 -->
                <div class="bg-white shadow-md rounded-lg p-6 text-center hover:shadow-xl transition">
                    <div class="mx-auto w-16 h-16 flex items-center justify-center bg-green-100 rounded-full mb-4">
                        <i class="fas fa-calendar-alt text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-green-700 mb-2">{{ __('messages.how_it_works.step2.title') }}</h3>
                    <p class="text-sm text-gray-600">{{ __('messages.how_it_works.step2.description') }}</p>
                </div>

                <!-- Étape 3 -->
                <div class="bg-white shadow-md rounded-lg p-6 text-center hover:shadow-xl transition">
                    <div class="mx-auto w-16 h-16 flex items-center justify-center bg-green-100 rounded-full mb-4">
                        <i class="fas fa-tasks text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-green-700 mb-2">{{ __('messages.how_it_works.step3.title') }}</h3>
                    <p class="text-sm text-gray-600">{{ __('messages.how_it_works.step3.description') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-green-600 py-12 rounded-xl shadow-lg mb-16">
        <div class="max-w-lg mx-auto text-center text-white">
            <h3 class="text-3xl font-semibold mb-4">{{ __('messages.cta.title') }}</h3>
            <p class="text-md mb-6">{{ __('messages.cta.description') }}</p>
            <a href="{{ route('precommande.type') }}" class="inline-block bg-white text-green-600 font-medium py-3 px-10 rounded-full shadow-md transform transition-all duration-300 hover:bg-green-50 hover:scale-105 hover:shadow-xl">
                <i class="fas fa-calendar-plus mr-2"></i>
                {{ __('messages.cta.button') }}
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-green-50 py-10">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4 text-sm text-gray-700">
            <div>
                <h4 class="font-semibold text-green-800 mb-2">CNI Rendez-vous</h4>
                <p>Service de prise de rendez-vous en ligne pour la Carte Nationale d'Identité.</p>
            </div>
            <div>
                <h4 class="font-semibold text-green-800 mb-2">Liens Rapides</h4>
                <ul class="space-y-1">
                    <li><a href="{{ url('/') }}" class="hover:text-green-600">Accueil</a></li>
                    <li><a href="{{ route('precommande.type') }}" class="hover:text-green-600">Prendre rendez-vous</a></li>
                    <li><a href="{{ route('precommande.suivi') }}" class="hover:text-green-600">Suivre ma demande</a></li>
                    <li><a href="{{ route('faq') }}" class="hover:text-green-600">Informations utiles</a></li>
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