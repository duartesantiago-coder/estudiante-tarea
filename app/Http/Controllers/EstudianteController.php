<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstudianteRequest;
use App\Http\Requests\UpdateEstudianteRequest;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::orderBy('id', 'desc')->get();// Obtener todos los estudiantes ordenados por ID de forma descendente

        return view('estudiantes.index', compact('estudiantes')); // Retornar la vista con la lista de estudiantes
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estudiantes.create'); // Retornar la vista para crear un nuevo estudiante
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEstudianteRequest $request) // Validar los datos de entrada utilizando StoreEstudianteRequest
    {
        $data = $request->validated(); // Validar los datos de entrada utilizando StoreEstudianteRequest

        if ($request->hasFile('foto_perfil')) { 
            $data['foto_perfil'] = $request->file('foto_perfil')->store('estudiantes', 'public'); // Almacenar la foto de perfil en el disco 'public' dentro de la carpeta 'estudiantes'
        }

        Estudiante::create($data); // Crear un nuevo estudiante con los datos validados

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado exitosamente.'); // Redirigir a la lista de estudiantes con un mensaje de éxito
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante) // Mostrar los detalles de un estudiante específico
    {
        return view('estudiantes.show', compact('estudiante')); // Retornar la vista para mostrar los detalles de un estudiante específico
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante) // Retornar la vista para editar un estudiante específico, pasando el estudiante como variable a la vista
    {
        return view('estudiantes.edit', compact('estudiante')); // Retornar la vista para editar un estudiante específico, pasando el estudiante como variable a la vista
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstudianteRequest $request, Estudiante $estudiante) // Validar los datos de entrada utilizando UpdateEstudianteRequest
    {
        $data = $request->validated(); // Validar los datos de entrada utilizando UpdateEstudianteRequest

        if ($request->hasFile('foto_perfil')) {
            if ($estudiante->foto_perfil && Storage::disk('public')->exists($estudiante->foto_perfil)) {
                Storage::disk('public')->delete($estudiante->foto_perfil);
            }

            $data['foto_perfil'] = $request->file('foto_perfil')->store('estudiantes', 'public');
        }

        $estudiante->update($data);

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
    {
        if ($estudiante->foto_perfil && Storage::disk('public')->exists($estudiante->foto_perfil)) { 
            Storage::disk('public')->delete($estudiante->foto_perfil); 
        }

        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado correctamente.');
    }
}
