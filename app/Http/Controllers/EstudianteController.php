<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::with('aula')->latest()->get();

        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aulas = Aula::orderBy('nombre')->get();

        return view('estudiantes.create', compact('aulas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'max:20', 'unique:estudiantes,dni'],
            'fecha_nacimiento' => ['required', 'date'],
            'aula_id' => ['nullable', 'exists:aulas,id'],
            'foto_perfil' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        if ($request->hasFile('foto_perfil')) {
            $data['foto_perfil'] = $request->file('foto_perfil')->store('fotos_perfil', 'public');
        }

        Estudiante::create($data);

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        $estudiante->load('aula');

        return view('estudiantes.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        $aulas = Aula::orderBy('nombre')->get();

        return view('estudiantes.edit', compact('estudiante', 'aulas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'max:20', 'unique:estudiantes,dni,' . $estudiante->id],
            'fecha_nacimiento' => ['required', 'date'],
            'aula_id' => ['nullable', 'exists:aulas,id'],
            'foto_perfil' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
        ]);

        if ($request->hasFile('foto_perfil')) {
            if ($estudiante->foto_perfil && Storage::disk('public')->exists($estudiante->foto_perfil)) {
                Storage::disk('public')->delete($estudiante->foto_perfil);
            }

            $data['foto_perfil'] = $request->file('foto_perfil')->store('fotos_perfil', 'public');
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
