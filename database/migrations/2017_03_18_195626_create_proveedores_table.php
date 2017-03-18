<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('proveedores', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->string('direccion');
          $table->string('ciudad');
          $table->string('estado');
          $table->string('telefono');
          $table->string('correo');
          $table->string('codigop');
          $table->string('contacto');
          $table->string('razon social');
          $table->string('rfc');
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
        Schema::drop('proveedores');
    }
}
