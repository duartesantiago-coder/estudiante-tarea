<?php

use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('estudiantes.index');
});

Route::resource('estudiantes', EstudianteController::class);
