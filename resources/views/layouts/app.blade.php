<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Estudiantes' }} | {{ config('app.name', 'Escuela') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .table-avatar img { width: 65px; height: 65px; object-fit: cover; border-radius: 0.375rem; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('estudiantes.index') }}" class="text-xl font-semibold text-gray-900">
                        {{ config('app.name', 'Escuela') }}
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('estudiantes.index') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Estudiantes
                    </a>
                    <a href="{{ route('estudiantes.create') }}" class="bg-blue-600 text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium">
                        Nuevo
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
