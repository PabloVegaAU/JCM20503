<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni');
            /* $table->string('nsocial'); */
            /* $table->string('discapacidad'); */
           /*  $table->string('tipo'); */
            /* $table->string('nglp'); */
            /* $table->string('dni'); */
           /*  $table->string('prepa'); */
            /* $table->string('ncelular1'); */
            /* $table->string('operador1'); */
            /* $table->string('ncelular2'); */
            /* $table->string('operador2'); */
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
