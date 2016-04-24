<?php

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
            $table->increments('id', 10)->comment('Identificador del usuario');
            $table->string('email', 100)->comment('Email del usuario')->unique();
            $table->string('password', 60)->comment('Contrasenya del usuario');
            $table->string('code', 32)->comment('Codigo de verificacion/recuperacion de usuario mandado por email');
            $table->boolean('verifiedEmail')->default(false)->comment('Booleano para saber si el email ha sido verificado o no');
            $table->enum('rol', ['administrador', 'profesor', 'estudiante', 'empresa'])->comment('Enumerado para el rol de usuario');
            $table->boolean('active')->default(false)->comment('Booleano para saber si ha sido validado como usuario real');
            $table->string('image', 255)->comment('Imagen de perfil por defecto');
            $table->string('carpeta', 255)->comment('Carpeta que contendra la imagen');
            $table->timestamps();
            $table->softDeletes();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
