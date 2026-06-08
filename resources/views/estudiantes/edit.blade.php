@extends('layouts.form')

@section('title', 'Editar Estudiante')
@section('header', 'Editar Estudiante')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Actualizar Datos del Estudiante</h3>
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
                    'action' => route('estudiantes.update', $estudiante),
                    'method' => 'PUT',
                    'buttonText' => 'Actualizar Estudiante',
                    'estudiante' => $estudiante,
                ])
<<<<<<< HEAD
                
            </div> 
=======

                <div class="card-footer">
                    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver al Listado
                    </a>
                </div>
            </div>
>>>>>>> Kamikaze
        </div>
    </div>
@endsection
