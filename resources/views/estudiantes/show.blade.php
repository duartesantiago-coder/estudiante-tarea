@extends('layouts.app')

@section('content')
    <div class="px-4 py-6 sm:px-0">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Datos estudiante</h1>
                <p class="text-gray-600 mt-1">Visualiza los datos del estudiante seleccionado.</p>
            </div>
            <a href="{{ route('estudiantes.index') }}" class="bg-gray-600 text-white hover:bg-gray-700 px-4 py-2 rounded-md text-sm font-medium">
                Volver al listado
            </a>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">Nombre completo</h2>
                        <p class="mt-1 text-sm text-gray-500">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</p>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">DNI</h2>
                        <p class="mt-1 text-sm text-gray-500">{{ $estudiante->dni }}</p>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">Fecha de nacimiento</h2>
                        <p class="mt-1 text-sm text-gray-500">{{ \Carbon\Carbon::parse($estudiante->fecha_nacimiento)->format('d/m/Y') }}</p> 
                    </div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">Foto de perfil</h2>
                        @if($estudiante->foto_perfil)
                            <img src="{{ asset('storage/' . $estudiante->foto_perfil) }}" alt="Foto de {{ $estudiante->nombre }}" class="w-32 h-32 object-cover rounded-md mt-1">
                        @else
                            <div class="w-32 h-32 bg-gray-200 rounded-md flex items-center justify-center mt-1">
                                <span class="text-gray-500 text-sm">Sin foto</span>
                            </div>
                        @endif
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
