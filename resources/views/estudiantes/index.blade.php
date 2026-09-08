@extends('layouts.admin')

@section('title', 'Estudiantes')
@section('header', 'Estudiantes')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Estudiantes</h3>
                    <div class="card-tools">
                        <a href="{{ route('estudiantes.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Agregar Estudiante
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    @if($estudiantes->isEmpty())
                        <div class="alert alert-info text-center mt-3">
                            <i class="fas fa-info-circle"></i> No hay estudiantes registrados. 
                            <a href="{{ route('estudiantes.create') }}" class="alert-link">Agregar uno</a>
                        </div>
                    @else
                        <table class="table table-hover text-nowrap" id="tabladetalle">
                            <thead>
                                <tr class="bg-light">
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>DNI</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Aula</th>
                                    <th>Creado</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($estudiantes as $estudiante)
                                    <tr>
                                        <td>
                                            @if($estudiante->foto_perfil)
                                                <img src="{{ asset('storage/' . $estudiante->foto_perfil) }}" alt="Foto de {{ $estudiante->nombre }}" class="img-circle img-size-32 mr-2" style="width: 32px; height: 32px; object-fit: cover;">
                                            @else
                                                <div class="img-circle img-size-32 mr-2 bg-gray-200" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fas fa-user text-gray-400"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td><strong>{{ $estudiante->nombre }}</strong></td>
                                        <td>{{ $estudiante->apellido }}</td>
                                        <td>{{ $estudiante->dni }}</td>
                                        <td>{{ \Carbon\Carbon::parse($estudiante->fecha_nacimiento)->format('d/m/Y') }}</td>
                                        <td><small class="text-muted">{{ $estudiante->aula->nombre ?? 'Sin aula' }}</small></td>
                                        <td><small class="text-muted">{{ $estudiante->created_at->format('d/m/Y H:i') }}</small></td>
                                        <td class="text-right">
                                            <a href="{{ route('estudiantes.show', $estudiante) }}" class="btn btn-xs btn-info" title="Ver">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('estudiantes.edit', $estudiante) }}" class="btn btn-xs btn-warning" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro?');">
                                                @csrf 
                                                @method('DELETE') 
                                                <button type="submit" class="btn btn-xs btn-danger" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#tabladetalle').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                },
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });
        });
    </script>
@endpush