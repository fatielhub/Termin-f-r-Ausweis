<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CNI Rendez-vous')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('images/LOGO.png') }}" alt="CNI Rendez-vous" style="height:40px;" class="me-2">
                <div class="d-flex flex-column">
                    <span class="fw-bold">CNI Rendez-vous</span>
                    <small class="text-muted">Service Officiel</small>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('precommande.type') }}" class="btn btn-success me-2">
                            <i class="fas fa-calendar-plus me-1"></i> Prendre rendez-vous
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('precommande.suivi') }}" class="btn btn-outline-success me-2">
                            <i class="fas fa-search me-1"></i> Suivre ma demande
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('faq') }}" class="btn btn-outline-secondary me-2">
                            <i class="fas fa-question-circle me-1"></i> FAQ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/login') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-user-shield me-1"></i> Admin
                        </a>
                    </li>
                </ul>
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
