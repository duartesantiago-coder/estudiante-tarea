@extends('layouts.app')

@section('content')
    <div class="px-4 py-6 sm:px-0">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Editar estudiante</h1>
                <p class="text-gray-600 mt-1">Actualiza los datos del estudiante seleccionado.</p>
            </div>
            <a href="{{ route('estudiantes.index') }}" class="bg-gray-600 text-white hover:bg-gray-700 px-4 py-2 rounded-md text-sm font-medium">
                Volver al listado
            </a>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 sm:p-6">
                @include('estudiantes._form', [
                    'action' => route('estudiantes.update', $estudiante),
                    'method' => 'PUT',
                    'buttonText' => 'Actualizar estudiante',
                    'estudiante' => $estudiante,
                ])
            </div>
        </div>
    </div>
@endsection
