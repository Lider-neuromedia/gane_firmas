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
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('cargo');
            $table->string('area');
            $table->integer('cedula');
            $table->integer('indicativo1');
            $table->integer('indicativo2');
            $table->integer('telefono');
            $table->integer('extension');
            $table->integer('celular');
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('direccion');
            $table->string('lugar');
            $table->unsignedBigInteger('departamento_id')->unsigned();
            $table->unsignedBigInteger('ciudad_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->string('imagen');
            // $table->string('password');
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
