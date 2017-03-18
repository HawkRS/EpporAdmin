<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{

  protected $fillable = [
      'nombres', 'apellidos', 'nacimiento', 'telefono', 'direccion', 'colonia'
      , 'codigop', 'emergencia', 'emetelefono', 'estado', 'entrada', 'salida'
  ];;

}
