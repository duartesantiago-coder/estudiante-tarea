<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni')->unique();
            $table->date('fecha_nacimiento');
            $table->string('foto_perfil')->nullable();
            $table->foreignId('aula_id')->nullable()->constrained('aulas')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void  //
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            if (Schema::hasColumn('estudiantes', 'foto_perfil')) { // Verificar si la columna 'foto_perfil' existe antes de eliminarla
                $table->dropColumn('foto_perfil'); // Eliminar la columna 'foto_perfil'
            }
            if (Schema::hasColumn('estudiantes', 'aula_id')) {
                $table->dropForeign('estudiantes_aula_id_foreign');
                $table->dropColumn('aula_id');
            }
        });
        Schema::dropIfExists('estudiantes');
    }
};
