<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {

            //FOREIGN USUARIO
            $table->unsignedBigInteger('user_id')->unique();


            //DECLARAMOS LLAVES PRIMARIAS
            $table->primary(['user_id']);

            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->string('sexo', 1);
            $table->string('dni', 8)->unique();
            $table->string('edad', 8);
            $table->date('fnacimiento');
            $table->string('ntelefono', 10)->unique();
            $table->string('direccion', 30);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

             //FOREIGN AULA
             $table->unsignedBigInteger('aula_id');
            $table->foreign('aula_id')->references('id')->on('aulas')->onDelete('cascade');
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
        Schema::dropIfExists('estudiantes');
    }
}
