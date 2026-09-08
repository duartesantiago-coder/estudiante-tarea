<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Escuela'))</title>

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;800&family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Space Grotesk', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(255, 95, 210, 0.12), transparent 24%),
                radial-gradient(circle at bottom right, rgba(103, 232, 249, 0.12), transparent 30%),
                #0f0a17;
        }

        .retro-page {
            background: #0f0a17;
        }

        .retro-wrapper {
            min-height: 100vh;
            background: linear-gradient(180deg, rgba(15, 10, 23, 0.98), rgba(12, 9, 18, 0.98));
        }

        .retro-header {
            background: linear-gradient(180deg, rgba(22, 16, 31, 0.98), rgba(17, 12, 23, 0.96));
            border-bottom: 1px solid rgba(255,255,255,0.1);
            box-shadow: 0 0 24px rgba(168, 85, 247, 0.12);
        }

        .retro-header .nav-link,
        .retro-top-link {
            color: #f7d7ff !important;
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            font-size: 0.68rem;
        }

        .retro-menu-button {
            color: #ffb7d9 !important;
            border: 1px solid rgba(255,255,255,0.12);
            background: rgba(255,255,255,0.03);
        }

        .retro-sidebar {
            background: linear-gradient(180deg, rgba(18, 14, 27, 0.98), rgba(10, 9, 16, 0.98));
            border-right: 1px solid rgba(255,255,255,0.12);
            box-shadow: inset -1px 0 0 rgba(255,255,255,0.04), 0 0 26px rgba(139, 92, 246, 0.12);
        }

        .retro-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 84px;
            padding: 18px 12px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            background: rgba(255,255,255,0.02);
            color: #fbd9ff !important;
            text-decoration: none;
            text-transform: uppercase;
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 0.18em;
        }

        .retro-sidebar .nav-pills .nav-link {
            color: #f5d7f3;
            border-radius: 0;
            border: 1px dashed rgba(168, 85, 247, 0.44);
            margin-bottom: 8px;
            padding: 0.8rem 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            font-size: 0.68rem;
            background: rgba(255,255,255,0.01);
        }

        .retro-sidebar .nav-pills .nav-link:hover,
        .retro-sidebar .nav-pills .nav-link.active {
            background: linear-gradient(90deg, rgba(255, 95, 210, 0.10), rgba(103, 232, 249, 0.06));
            border-style: solid;
            border-color: rgba(255, 95, 210, 0.6);
            color: #fff;
        }

        .retro-content-wrapper {
            background: transparent;
        }

        .retro-content-header {
            background: transparent;
            padding: 1.5rem 1.5rem 0.5rem;
            border-bottom: 1px dashed rgba(168, 85, 247, 0.35);
        }

        .retro-content-header h1 {
            font-family: 'Orbitron', sans-serif;
            text-transform: uppercase;
            letter-spacing: 0.18em;
            color: #f7d7ff;
            font-size: clamp(1.3rem, 2vw, 2.3rem);
        }

        .retro-content .container-fluid {
            padding: 1.25rem 1.4rem 1.6rem;
        }

        .retro-footer {
            background: rgba(12, 9, 18, 0.96);
            border-top: 1px solid rgba(255,255,255,0.09);
            color: #d8bfd6;
        }

        .retro-footer a {
            color: #ffb7d9;
        }

        .main-sidebar .brand-link {
            color: #fff;
        }

        .main-sidebar .nav-sidebar .nav-treeview {
            margin: 0;
            padding: 0;
        }

        @media (max-width: 767px) {
            .retro-brand {
                min-height: 64px;
            }

            .retro-content-header {
                padding-top: 1rem;
            }
        }
    </style>

    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed retro-page">
<div class="wrapper retro-wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light retro-header">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link retro-menu-button" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('/') }}" class="nav-link retro-top-link">Inicio</a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4 retro-sidebar">
        <a href="{{ url('/') }}" class="brand-link retro-brand">
            <span class="brand-text font-weight-light">{{ config('app.name', 'Escuela') }}</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('estudiantes.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>Estudiantes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('estudiantes.create') }}" class="nav-link">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Registrar</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper retro-content-wrapper">
        <section class="content-header retro-content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('header', 'Panel')</h1>
                    </div>
                    <div class="col-sm-6">
                        @yield('breadcrumbs')
                    </div>
                </div>
            </div>
        </section>

        <section class="content retro-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    <footer class="main-footer retro-footer">
        <div class="float-right d-none d-sm-inline">Atracciones</div>
        <strong>Copyright &copy; {{ date('Y') }} <a href="{{ url('/') }}">{{ config('app.name', 'Escuela') }}</a>.</strong> Todos los derechos reservados.
    </footer>
</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
@stack('scripts')
</body>
</html>
