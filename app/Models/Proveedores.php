<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{

  protected $fillable = [
      'nombres', 'direccion', 'colonia', 'ciudad', 'estado', 'telefono'
      , 'correo', 'codigop', 'contacto', 'razon_social', 'rfc'
  ];

}
