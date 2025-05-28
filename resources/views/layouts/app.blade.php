<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CNI Rendez-vous')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <style>
        :root {
            --primary-green: #2E7D32;
            --light-green: #4CAF50;
            --hover-green: #1B5E20;
            --bg-light: #F1F8E9;
        }
        
        body {
            background: var(--bg-light);
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }

        .btn-success {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }

        .btn-success:hover {
            background-color: var(--hover-green);
            border-color: var(--hover-green);
        }

        .btn-outline-success {
            color: var(--primary-green);
            border-color: var(--primary-green);
        }

        .btn-outline-success:hover {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }

        .card {
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border-radius: 15px;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            padding: 12px;
        }

        .form-control:focus {
            border-color: var(--light-green);
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
        }

        .table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
        }

        .table thead {
            background-color: var(--primary-green);
            color: white;
        }

        .badge {
            padding: 8px 12px;
            border-radius: 8px;
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        .alert-success {
            background-color: #E8F5E9;
            color: var(--primary-green);
        }

        .alert-danger {
            background-color: #FFEBEE;
            color: #C62828;
        }

        .container {
            max-width: 1200px;
            padding: 2rem 1rem;
        }

        .navbar-brand {
            font-weight: 600;
            color: var(--primary-green) !important;
        }

        .nav-link {
            color: #333;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-green);
        }

        .footer {
            background: white;
            padding: 2rem 0;
            margin-top: 3rem;
            box-shadow: 0 -2px 15px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
     <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/LOGO.png') }}" alt="logo" class="h-12 w-12 rounded-lg">
                <div class="flex flex-col leading-tight">
                    <h1 class="text-green-800 font-extrabold text-2xl leading-tight">CNI Rendez-vous</h1>
                    <p class="text-sm text-gray-600">Service officiel</p>
                </div>
            </div>
            
            <div class="flex items-center space-x-6">
                <a href="{{ route('faq') }}" class="flex flex-col items-center text-gray-700 hover:text-green-600 text-sm">
                    <div class="h-10 w-10 flex items-center justify-center rounded-full bg-green-100 text-green-600 mb-1">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.79 4 4s-1.79 4-4 4c-.71 0-1.36-.2-1.907-.55L8 16v-2.586a1 1 0 00-.293-.707l-1.414-1.414A1 1 0 004.586 9H2m4 0a2 2 0 114 0M2 16h.01M6 16h.01" />
                        </svg>
                    </div>
                    FAQ
                    <p class="text-xs text-gray-500">Questions fréquentes</p>
                </a>

                <a href="{{ route('precommande.type') }}" class="flex flex-col items-center text-gray-700 hover:text-green-600 text-sm">
                    <div class="h-10 w-10 flex items-center justify-center rounded-full bg-green-100 text-green-600 mb-1">
                         <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 19h14M5 15h14" />
                         </svg>
                    </div>
                    Rendez-vous
                    <p class="text-xs text-gray-500">Réserver en ligne</p>
                </a>
                
                <a href="{{ route('precommande.suivi') }}" class="flex flex-col items-center text-gray-700 hover:text-green-600 text-sm">
                    <div class="h-10 w-10 flex items-center justify-center rounded-full bg-green-100 text-green-600 mb-1">
                        <svg  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    Suivi
                    <p class="text-xs text-gray-500">Suivre ma demande</p>
                </a>

                <a href="{{ route('admin.login') }}" class="flex flex-col items-center text-gray-700 hover:text-green-600 text-sm">
                    <div class="h-10 w-10 flex items-center justify-center rounded-full bg-green-100 text-green-600 mb-1">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    Admin
                    <p class="text-xs text-gray-500">Espace administration</p>
                </a>
            </div>
        </div>
    </nav>
    <main class="container">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container text-center">
            <p class="mb-0">&copy; {{ date('Y') }} CNI Rendez-vous. Tous droits réservés.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>