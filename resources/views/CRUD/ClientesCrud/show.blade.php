@extends('layouts.app')

@section('content')

<section class="main-section">
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="pull-left">
          <h2>Detalle de {{ $item->nombres }}</h2>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class="panel-body">
      <div class="panel-actions">
        <a class="btn btn-block btn-primary" href="{{ route('ClientesCrud.index') }}">Volver</a>
        <div class="mh-45"></div>
        <a class="btn btn-block btn-warning" href="{{ route('ClientesCrud.edit',$item->id) }}">Editar</a>
      </div>

      {{-- DATOS DE CLIENTE --}}

      <div class="fluid-container">

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <table class="table table-striped table-bordered">
              <tr>
                <td><strong class="title">Nombre:</strong></td>
                <td>{{ $item->nombres }}</td>
              </tr>
              <tr>
                <td><strong class="title">Direccion:</strong></td>
                <td>{{ $item->direccion }}</td>
              </tr>
              <tr>
                <td><strong class="title">Colonia:</strong></td>
                <td>{{ $item->colonia }}</td>
              </tr>
              <tr>
                <td><strong class="title">Ciudad:</strong></td>
                <td>{{ $item->ciudad }}</td>
              </tr>
              <tr>
                <td><strong class="title">Estado:</strong></td>
                <td>{{ $item->estado }}</td>
              </tr>
              <tr>
                <td><strong class="title">Telefono:</strong></td>
                <td>{{ $item->telefono }}</td>
              </tr>
              <tr>
                <td><strong class="title">Correo:</strong></td>
                <td>{{ $item->correo }}</td>
              </tr>
              <tr>
                <td><strong class="title">Codigo Postal:</strong></td>
                <td>{{ $item->codigop }}</td>
              </tr>
              <tr>
                <td><strong class="title">Razon Social:</strong></td>
                <td>{{ $item->razon_social }}</td>
              </tr>
              <tr>
                <td><strong class="title">RFC:</strong></td>
                <td>{{ $item->rfc }}</td>
              </tr>
              <tr>
                <td><strong class="title">Contacto:</strong></td>
                <td>{{ $item->contacto }}</td>
              </tr>
              </table> {{-- END TABLE --}}
          </div>
        </div>{{-- END ROW --}}


      </div>
    </div>

  </div>



</section>

@endsection
