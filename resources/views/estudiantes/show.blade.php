@extends('layouts.admin')

@section('title', 'Ver Estudiante')
@section('header', 'Detalle del Estudiante')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Información del Estudiante</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            @if($estudiante->foto_perfil)
                                <img src="{{ asset('storage/' . $estudiante->foto_perfil) }}" alt="Foto de {{ $estudiante->nombre }}" class="img-circle" style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #007bff;">
                            @else
                                <div class="img-circle" style="width: 150px; height: 150px; background-color: #e3e6e8; display: flex; align-items: center; justify-content: center; margin: 0 auto; border: 3px solid #007bff;">
                                    <i class="fas fa-user" style="font-size: 60px; color: #999;"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%;">Nombre</th>
                                        <td>{{ $estudiante->nombre }}</td>
                                    </tr>
                                    <tr>
                                        <th>Apellido</th>
                                        <td>{{ $estudiante->apellido }}</td>
                                    </tr>
                                    <tr>
                                        <th>DNI</th>
                                        <td>{{ $estudiante->dni }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fecha de Nacimiento</th>
                                        <td>{{ \Carbon\Carbon::parse($estudiante->fecha_nacimiento)->format('d/m/Y') }}</td>
                                    </tr>
                                        <tr>
                                            <th>Aula</th>
                                            <td>{{ $estudiante->aula->nombre ?? 'Sin aula asignada' }}</td> 
                                        </tr>   
                                    <tr>
                                        <th>Registrado</th>
                                        <td>{{ $estudiante->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('estudiantes.edit', $estudiante) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
