<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_matricula');
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('asignatura_id');
            $table->enum('estado', ['abierta', 'cerrada']);
            $table->timestamps();

            // Restricción para la fecha de matrícula no anterior a la fecha actual
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
};
