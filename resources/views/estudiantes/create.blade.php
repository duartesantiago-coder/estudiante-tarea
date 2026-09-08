@extends('layouts.admin')

@section('title', 'Agregar Estudiante')
@section('header', 'Agregar Estudiante')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Formulario de Registro</h3>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>¡Error!</strong> Por favor revisa los errores abajo.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @include('estudiantes._form', [
                    'action' => route('estudiantes.store'),
                    'method' => 'POST',
                    'buttonText' => 'Guardar Estudiante',
                    'estudiante' => null,
                ])

                <div class="card-footer">
                    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver al Listado
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
