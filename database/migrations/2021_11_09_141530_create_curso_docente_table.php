<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_docente', function (Blueprint $table) {

            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('curso_id');
            //DECLARAMOS LLAVES PRIMARIAS
            $table->primary(['docente_id', 'curso_id']);
            //FOREIGN DOCENTE
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
            //FOREIGN CURSO
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
        Schema::dropIfExists('curso_docente');
    }
}
