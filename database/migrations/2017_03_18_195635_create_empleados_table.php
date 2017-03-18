<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('empleados', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombres');
          $table->string('apellidos');
          $table->date('nacimiento');
          $table->string('telefono');
          $table->string('direccion');
          $table->string('colonia');
          $table->string('codigop');
          $table->string('emergencia')->nullable();
          $table->string('emetelefono')->nullable();
          $table->boolean('estado')->default('1');
          $table->date('entrada');
          $table->date('salida')->default(NULL);
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
        Schema::drop('empleados');
    }
}
