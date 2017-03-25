@extends('layouts.app')

@section('content')
<section class="main-section">

  <div class="panel panel-default">

    <div class="panel-heading">
      <div class="pull-left">
          <h2>Clientes</h2>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="panel-actions">
      {!! Form::open(array('route' => 'filter','method'=>'GET', 'class' => 'form')) !!}
      {!! Form::text('filtrar', null, array('placeholder' => 'Ingresa el nombre a buscar','class' => 'form-control')) !!}
      {!! Form::submit('Buscar', ['class' => 'btn btn-xs btn-info']) !!}
      {!! Form::close() !!}
      <a class="btn btn-success" href="{{ route('ClientesCrud.create') }}">Crear</a>
      <a class="btn btn-primary" href="{{ url('/') }}">Volver</a>
    </div>
    <div class="panel-body">

      @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif
      <table class="table table-bordered">
          <tr>
              <th>No</th>
              <th>Nombre</th>
              <th>Razon Social</th>
              <th>RFC</th>
              <th>Telefono</th>
              <th>Correo</th>
              <th>Contacto</th>
              <th>Direccion</th>
              <th>Colonia</th>
              <th>Estado</th>
              <th>Codigo Postal</th>
              <th>Acciones</th>
          </tr>
      @foreach ($items as $key => $item)
      <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $item->nombres }}</td>
          <td>{{ $item->razon_social }}</td>
          <td>{{ $item->rfc }}</td>
          <td>{{ $item->telefono }}</td>
          <td>{{ $item->correo }}</td>
          <td>{{ $item->contacto }}</td>
          <td>{{ $item->direccion }}</td>
          <td>{{ $item->colonia }}</td>
          <td>{{ $item->estado }}</td>
          <td>{{ $item->codigop }}</td>
          <td>
              <a class="btn btn-info" href="{{ route('ClientesCrud.edit',$item->id) }}">Edit</a>
              {!! Form::open(['method' => 'DELETE','route' => ['ClientesCrud.destroy', $item->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
          </td>
      </tr>
      @endforeach
      </table>

    </div>{{-- END PANEL BODY --}}
  </div>{{-- END PANEL --}}
</section>
{!! $items->render() !!}

@endsection
