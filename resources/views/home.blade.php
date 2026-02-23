<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CNI Rendez-vous – Prenez votre rendez-vous en ligne pour la Carte Nationale d'Identité Électronique du Maroc.">
    <title>Accueil — CNI Rendez-vous</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-gray-800">

{{-- ══ NAVBAR ══ --}}
<header class="navbar" id="main-nav">
    <div class="container-main flex items-center justify-between h-16">
        <a href="{{ route('home') }}" class="flex items-center gap-3 group">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-600 to-teal-500 flex items-center justify-center shadow-sm group-hover:shadow-md transition-shadow">
                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0"/>
                </svg>
            </div>
            <div class="leading-tight">
                <span class="block font-extrabold text-emerald-800 text-lg leading-none">CNI Rendez-vous</span>
            </div>
        </a>

        <nav class="hidden md:flex items-center gap-1">
            <a href="{{ route('home') }}" class="nav-link-item nav-link-active">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Accueil
            </a>
            <a href="{{ route('precommande.type') }}" class="nav-link-item">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 19h14M5 15h14"/></svg>
                Rendez-vous
            </a>
            <a href="{{ route('precommande.suivi') }}" class="nav-link-item">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                Suivi
            </a>
            <a href="{{ route('faq') }}" class="nav-link-item">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3s-1.79 3-4 3a3.5 3.5 0 01-1.907-.55M12 18h.01"/></svg>
                FAQ
            </a>
        </nav>

        <div class="flex items-center gap-3">
            <a href="{{ route('admin.login') }}" class="hidden md:inline-flex btn btn-primary">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                Admin
            </a>
            <button id="menu-toggle" class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </div>
    <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 bg-white px-4 py-3 space-y-1">
        <a href="{{ route('home') }}" class="mobile-nav-link">Accueil</a>
        <a href="{{ route('precommande.type') }}" class="mobile-nav-link">Prendre rendez-vous</a>
        <a href="{{ route('precommande.suivi') }}" class="mobile-nav-link">Suivi de demande</a>
        <a href="{{ route('faq') }}" class="mobile-nav-link">FAQ</a>
        <a href="{{ route('admin.login') }}" class="mobile-nav-link text-emerald-700 font-semibold">Espace Admin</a>
    </div>
</header>

{{-- ══ HERO ══ --}}
<section class="relative hero-gradient overflow-hidden">
    {{-- Background blobs --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-teal-400/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-emerald-300/15 rounded-full blur-3xl"></div>
    </div>

    <div class="container-main relative z-10 py-20 lg:py-28">
        <div class="grid lg:grid-cols-2 gap-12 items-center">

            {{-- Text --}}
            <div class="animate-fade-in-up">
                
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-6">
                    Carte Nationale<br>
                    d'Identité <span class="text-emerald-300">Électronique</span>
                </h1>
                <p class="text-emerald-100 text-lg leading-relaxed mb-8 max-w-lg">
                    Un titre identitaire hautement sécurisé permettant à tout citoyen de s'identifier et d'accéder simplement aux services numériques.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('precommande.type') }}" class="btn btn-lg bg-white text-emerald-800 hover:bg-emerald-50 shadow-lg hover:shadow-xl active:scale-95">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 19h14M5 15h14"/></svg>
                        Prendre rendez-vous
                    </a>
                    <a href="{{ route('precommande.suivi') }}" class="btn btn-lg border-2 border-white/40 text-white hover:bg-white/10 backdrop-blur-sm">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        Suivre ma demande
                    </a>
                </div>
            </div>

            {{-- Card Image --}}
            <div class="hidden lg:flex justify-center items-center animate-fade-in-up-d">
                <div class="relative">
                    <div class="absolute inset-0 bg-emerald-400/30 rounded-3xl blur-2xl transform scale-105"></div>
                    <img src="{{ asset('images/carte.jpg') }}" alt="Carte Nationale d'Identité Électronique"
                         class="relative rounded-3xl shadow-2xl object-cover w-96 h-60 border-4 border-white/30 animate-float">
                </div>
            </div>
        </div>
    </div>

    {{-- Wave --}}
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="w-full h-12 text-slate-50">
            <path d="M0 60H1440V0C1200 40 960 60 720 50C480 40 240 0 0 30V60Z" fill="currentColor"/>
        </svg>
    </div>
</section>

{{-- ══ STATS STRIP ══ --}}
<section class="bg-white border-b border-gray-100">
    <div class="container-main py-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach([
                ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0', 'value' => '2M+', 'label' => 'Citoyens servis'],
                ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'value' => '98%', 'label' => 'Satisfaction client'],
                ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'value' => '< 5min', 'label' => 'Temps de réservation'],
                ['icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z', 'value' => '50+', 'label' => 'Centres disponibles'],
            ] as $stat)
            <div class="flex items-center gap-4 p-4 rounded-xl hover:bg-slate-50 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}"/></svg>
                </div>
                <div>
                    <div class="text-xl font-extrabold text-gray-900">{{ $stat['value'] }}</div>
                    <div class="text-xs text-gray-500">{{ $stat['label'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══ HOW IT WORKS ══ --}}
<section class="section section-gradient">
    <div class="container-medium text-center">
        <div class="mb-12">
            <span class="inline-block text-xs font-bold uppercase tracking-widest text-emerald-600 bg-emerald-50 px-4 py-1.5 rounded-full mb-3">Processus simple</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">Comment ça marche ?</h2>
            <p class="text-gray-500 max-w-xl mx-auto">Réservez votre rendez-vous CNIE en 3 étapes simples depuis votre domicile.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 relative">
            {{-- Connector line --}}
            <div class="hidden md:block absolute top-12 left-1/4 right-1/4 h-0.5 bg-gradient-to-r from-emerald-200 via-emerald-400 to-emerald-200"></div>

            @foreach([
                ['step' => '01', 'icon' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z', 'title' => 'Remplir le formulaire', 'desc' => 'Entrez vos informations personnelles en quelques minutes depuis chez vous.'],
                ['step' => '02', 'icon' => 'M8 7V3m8 4V3m-9 4h10M5 11h14M5 19h14M5 15h14', 'title' => 'Choisir un créneau', 'desc' => 'Sélectionnez la date, l\'heure et le centre qui vous convient le mieux.'],
                ['step' => '03', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Confirmer & Suivre', 'desc' => 'Recevez votre code de suivi et consultez l\'état de votre demande en ligne.'],
            ] as $step)
            <div class="card-hover p-8 text-center relative z-10">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-400 flex items-center justify-center mx-auto mb-5 shadow-lg shadow-emerald-200">
                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $step['icon'] }}"/></svg>
                </div>
                <span class="inline-block text-xs font-bold text-emerald-500 bg-emerald-50 px-2.5 py-1 rounded-full mb-3">Étape {{ $step['step'] }}</span>
                <h3 class="font-bold text-gray-900 text-lg mb-2">{{ $step['title'] }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══ QUICK SERVICES ══ --}}
<section class="section bg-white">
    <div class="container-medium">
        <div class="text-center mb-12">
            <span class="inline-block text-xs font-bold uppercase tracking-widest text-emerald-600 bg-emerald-50 px-4 py-1.5 rounded-full mb-3">Nos services</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Type de demande</h2>
        </div>
        <div class="grid md:grid-cols-2 gap-6">
            <a href="{{ route('precommande.type') }}?type_demande=nouvelle" class="group card-hover p-7 flex gap-5 items-start">
                <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 text-lg mb-1 group-hover:text-emerald-700 transition-colors">Première demande</h3>
                    <p class="text-sm text-gray-500">Demandez votre CNIE pour la première fois. Remplissez le formulaire et obtenez un rendez-vous.</p>
                    <span class="inline-flex items-center gap-1 text-xs text-emerald-600 font-semibold mt-3">
                        Commencer
                        <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </span>
                </div>
            </a>
            <a href="{{ route('precommande.type') }}?type_demande=renouvellement" class="group card-hover p-7 flex gap-5 items-start">
                <div class="w-14 h-14 rounded-2xl bg-teal-100 text-teal-600 flex items-center justify-center flex-shrink-0 group-hover:bg-teal-600 group-hover:text-white transition-all duration-300">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 text-lg mb-1 group-hover:text-teal-700 transition-colors">Renouvellement</h3>
                    <p class="text-sm text-gray-500">Renouvelez votre carte expirée, perdue ou endommagée rapidement et simplement.</p>
                    <span class="inline-flex items-center gap-1 text-xs text-teal-600 font-semibold mt-3">
                        Commencer
                        <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </span>
                </div>
            </a>
        </div>
    </div>
</section>

{{-- ══ CTA ══ --}}
<section class="section">
    <div class="container-main">
        <div class="hero-gradient rounded-3xl overflow-hidden relative">
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-0 right-0 w-72 h-72 bg-white/5 rounded-full transform translate-x-1/3 -translate-y-1/3"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-teal-400/10 rounded-full transform -translate-x-1/3 translate-y-1/3"></div>
            </div>
            <div class="relative z-10 text-center py-16 px-8">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">Prêt à commencer ?</h2>
                <p class="text-emerald-200 text-lg mb-8 max-w-md mx-auto">Réservez votre rendez-vous en ligne en moins de 5 minutes et évitez les files d'attente.</p>
                <a href="{{ route('precommande.type') }}" class="btn btn-lg bg-white text-emerald-800 hover:bg-emerald-50 shadow-xl hover:shadow-2xl">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 19h14M5 15h14"/></svg>
                    Prendre rendez-vous maintenant
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ══ FOOTER ══ --}}
<footer class="bg-gradient-to-br from-emerald-900 to-emerald-800 text-white">
    <div class="container-main py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 rounded-lg bg-white/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0"/></svg>
                    </div>
                    <span class="font-bold text-lg">CNI Rendez-vous</span>
                </div>
                <p class="text-emerald-200 text-sm leading-relaxed">Service officiel de prise de rendez-vous pour la CNIE au Maroc.</p>
            </div>
            <div>
                <h4 class="font-semibold text-white mb-4 text-sm uppercase tracking-wide">Liens rapides</h4>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('home') }}" class="text-emerald-300 hover:text-white transition-colors">Accueil</a></li>
                    <li><a href="{{ route('precommande.type') }}" class="text-emerald-300 hover:text-white transition-colors">Prendre rendez-vous</a></li>
                    <li><a href="{{ route('precommande.suivi') }}" class="text-emerald-300 hover:text-white transition-colors">Suivi de demande</a></li>
                    <li><a href="{{ route('faq') }}" class="text-emerald-300 hover:text-white transition-colors">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-white mb-4 text-sm uppercase tracking-wide">Contact</h4>
                <ul class="space-y-3 text-sm text-emerald-200">
                    <li class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        +212 5XX-XXXXXX
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        contact@cnirendezvous.ma
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-emerald-700 mt-10 pt-6 text-center text-sm text-emerald-400">
            &copy; {{ date('Y') }} CNI Rendez-vous — Tous droits réservés.
        </div>
    </div>
</footer>

<script>
    document.getElementById('menu-toggle')?.addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
    const nav = document.getElementById('main-nav');
    window.addEventListener('scroll', () => {
        nav?.classList.toggle('shadow-md', window.scrollY > 10);
    });
</script>

<style>
.nav-link-item {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.5rem 0.875rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #4b5563;
    transition: all 0.2s;
}
.nav-link-item:hover { background-color: #f0fdf4; color: #047857; }
.nav-link-active { background-color: #f0fdf4; color: #047857; }
.mobile-nav-link {
    display: block;
    padding: 0.625rem 0.75rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    transition: all 0.2s;
}
.mobile-nav-link:hover { background-color: #f0fdf4; color: #047857; }
</style>
</body>
</html>