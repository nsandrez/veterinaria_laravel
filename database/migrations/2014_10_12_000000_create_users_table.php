<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('estado', ['OPERATIVO', 'DESHABILITADO'])->default('OPERATIVO');
            $table->string('rol')->nullable();
            $table->string('telefono')->nullable();
            $table->string('reset_token')->nullable();
            $table->timestamp('token_expiry')->nullable();
            $table->timestamp('ultima_conexion')->nullable();
            $table->string('foto_perfil')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
