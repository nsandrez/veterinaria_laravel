<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historial_medico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mascota_id');
            $table->unsignedBigInteger('veterinario_id');
            $table->text('descripcion');
            $table->text('observaciones')->nullable();
            $table->date('fecha_consulta');
            $table->string('estado_salud')->nullable();
            $table->string('tratamiento')->nullable();
            $table->string('medicamentos')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->foreign('mascota_id')->references('id')->on('mascotas')->onDelete('cascade');
            $table->foreign('veterinario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_medico');
    }
};
