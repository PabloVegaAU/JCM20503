<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50);
            $table->string('sexo', 1);
            $table->string('dni', 8)->unique();
            $table->string('edad', 8);
            $table->date('fnacimiento');
            $table->string('ntelefono', 10)->unique();
            $table->string('direccion', 30);
            //FOREIGN USUARIO
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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

        Schema::dropIfExists('docentes');
    }
}
