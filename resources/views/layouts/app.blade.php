<!DOCTYPE html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CNI Rendez-vous – Service officiel de prise de rendez-vous en ligne pour la Carte Nationale d'Identité Électronique.">
    <title>@yield('title', 'CNI Rendez-vous')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="h-full flex flex-col bg-slate-50">

    {{-- ══ NAVBAR ══ --}}
    <header class="navbar" id="main-nav">
        <div class="container-main flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-600 to-teal-500 flex items-center justify-center shadow-sm group-hover:shadow-md transition-shadow">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0"/>
                    </svg>
                </div>
                <div class="leading-tight">
                    <span class="block font-extrabold text-emerald-800 text-lg leading-none">CNI Rendez-vous</span>
                    <span class="block text-xs text-gray-500 font-normal">Service officiel</span>
                </div>
            </a>

            {{-- Desktop Nav --}}
            <nav class="hidden md:flex items-center gap-1">
                <a href="{{ route('home') }}" class="nav-link-item {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Accueil
                </a>
                <a href="{{ route('precommande.type') }}" class="nav-link-item {{ request()->routeIs('precommande.*') ? 'nav-link-active' : '' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 19h14M5 15h14"/></svg>
                    Rendez-vous
                </a>
                <a href="{{ route('precommande.suivi') }}" class="nav-link-item">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Suivi
                </a>
                <a href="{{ route('faq') }}" class="nav-link-item {{ request()->routeIs('faq') ? 'nav-link-active' : '' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3s-1.79 3-4 3a3.5 3.5 0 01-1.907-.55M12 18h.01"/></svg>
                    FAQ
                </a>
            </nav>

            {{-- Admin CTA --}}
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.login') }}" class="hidden md:inline-flex btn btn-primary">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Admin
                </a>
                {{-- Mobile menu button --}}
                <button id="menu-toggle" class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors" aria-label="Menu">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>

        {{-- Mobile Nav --}}
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 bg-white px-4 py-3 space-y-1">
            <a href="{{ route('home') }}" class="mobile-nav-link">Accueil</a>
            <a href="{{ route('precommande.type') }}" class="mobile-nav-link">Prendre rendez-vous</a>
            <a href="{{ route('precommande.suivi') }}" class="mobile-nav-link">Suivi de demande</a>
            <a href="{{ route('faq') }}" class="mobile-nav-link">FAQ</a>
            <a href="{{ route('admin.login') }}" class="mobile-nav-link text-emerald-700 font-semibold">Espace Admin</a>
        </div>
    </header>

    {{-- ══ MAIN CONTENT ══ --}}
    <main class="flex-1" id="page-content">
        {{-- Global flash messages --}}
        @if(session('success'))
            <div class="container-main pt-4">
                <div class="alert-success animate-fade-in-up" role="alert">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif
        @if(session('error'))
            <div class="container-main pt-4">
                <div class="alert-danger animate-fade-in-up" role="alert">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif
        @yield('content')
    </main>

    {{-- ══ FOOTER ══ --}}
    <footer class="bg-gradient-to-br from-emerald-900 to-emerald-800 text-white mt-auto">
        <div class="container-main py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 rounded-lg bg-white/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0"/></svg>
                        </div>
                        <span class="font-bold text-lg">CNI Rendez-vous</span>
                    </div>
                    <p class="text-emerald-200 text-sm leading-relaxed">Service officiel de prise de rendez-vous pour la Carte Nationale d'Identité Électronique.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-4 text-sm uppercase tracking-wide">Liens rapides</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}" class="text-emerald-300 hover:text-white transition-colors">Accueil</a></li>
                        <li><a href="{{ route('precommande.type') }}" class="text-emerald-300 hover:text-white transition-colors">Prendre rendez-vous</a></li>
                        <li><a href="{{ route('precommande.suivi') }}" class="text-emerald-300 hover:text-white transition-colors">Suivi de demande</a></li>
                        <li><a href="{{ route('faq') }}" class="text-emerald-300 hover:text-white transition-colors">Questions fréquentes</a></li>
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
        // Mobile menu toggle
        document.getElementById('menu-toggle')?.addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Navbar scroll shadow
        const nav = document.getElementById('main-nav');
        window.addEventListener('scroll', () => {
            nav?.classList.toggle('shadow-md', window.scrollY > 10);
        });
    </script>

    @stack('scripts')
</body>
</html>

<style>
.nav-link-item {
    @apply flex items-center gap-1.5 px-3.5 py-2 rounded-lg text-sm font-medium text-gray-600
           hover:bg-emerald-50 hover:text-emerald-700 transition-all duration-200;
}
.nav-link-active {
    @apply bg-emerald-50 text-emerald-700;
}
.mobile-nav-link {
    @apply block px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 transition-colors;
}
</style>