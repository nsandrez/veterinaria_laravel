<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historial_medico_pdf', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('historial_id');
            $table->string('pdf_path');
            $table->timestamps();

            $table->foreign('historial_id')->references('id')->on('historial_medico')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_medico_pdf');
    }
};
