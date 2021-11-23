<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulaCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_curso', function (Blueprint $table) {
            $table->unsignedBigInteger('horario_id');
            $table->unsignedBigInteger('curso_id');

            $table->primary(['horario_id', 'curso_id']);

            //Foreign Aula
            $table->foreign('horario_id')->references('id')->on('horarios')->onDelete('cascade');
            //Foreign Curso
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aula_curso');
    }
}
