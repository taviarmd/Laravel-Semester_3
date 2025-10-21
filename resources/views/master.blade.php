<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
        }

        .navbar-custom {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem !important;
            border-radius: 5px;
        }

        .nav-link:hover {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-link.active {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.2);
        }

        main {
            min-height: calc(100vh - 180px);
            padding: 2rem 0;
        }

        footer {
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
            color: white;
            padding: 2rem 0;
            margin-top: 3rem;
        }

        .content-wrapper {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }

        .page-header {
            border-bottom: 3px solid var(--primary-color);
            padding-bottom: 1rem;
            margin-bottom: 2rem;
        }

        .page-header h1 {
            color: var(--primary-color);
            font-weight: 700;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-building"></i> App Pegawai
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('employees*') ? 'active' : '' }}"
                            href="{{ url('/employees') }}">
                            <i class="bi bi-people"></i> Employee
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('departments*') ? 'active' : '' }}"
                            href="{{ url('/departments') }}">
                            <i class="bi bi-diagram-3"></i> Department
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('attendances*') ? 'active' : '' }}"
                            href="{{ url('/attendances') }}">
                            <i class="bi bi-calendar-check"></i> Attendances
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('salaries.index') }}">
                            <i class="bi bi-cash-stack"></i> Salaries
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('report*') ? 'active' : '' }}" href="{{ url('/report') }}">
                            <i class="bi bi-file-earmark-text"></i> Report
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('settings*') ? 'active' : '' }}"
                            href="{{ url('/settings') }}">
                            <i class="bi bi-gear"></i> Settings
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-x-circle"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="text-center">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} App Pegawai. All rights reserved.</p>
            <small>Developed with <i class="bi bi-heart-fill text-danger"></i> using Laravel 11</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>