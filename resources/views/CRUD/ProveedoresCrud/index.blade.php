@extends('layouts.app')

@section('content')
<section class="main-section">

  <div class="panel panel-default">

    <div class="panel-heading">
      <div class="pull-left">
          <h2>Proveedores</h2>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="panel-actions">
      {!! Form::open(array('route' => 'FilterProveedor','method'=>'GET', 'class' => 'search-form')) !!}
        {!! Form::text('filtrar', null, array('placeholder' => 'Ingresa el nombre a buscar','class' => ' search-text')) !!}
        <div class="mh-5"></div>
        {!! Form::submit('Buscar', ['class' => 'btn btn-info search-btn']) !!}
      <div class="mh-10"></div>{{-- MARGEN ENTRE BOTONES --}}
      {!! Form::close() !!}
      <a class="btn btn-block btn-success" href="{{ route('ProveedoresCrud.create') }}">Crear</a>
      <div class="mh-10"></div>{{-- MARGEN ENTRE BOTONES --}}
      <a class="btn btn-block btn-primary" href="{{ url('/') }}">Volver</a>
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
              <th>Telefono</th>
              <th>Correo</th>
              <th>Ciudad</th>
              <th>Acciones</th>
          </tr>
      @foreach ($items as $key => $item)
      <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $item->nombres }}</td>
          <td>{{ $item->razon_social }}</td>
          <td>{{ $item->telefono }}</td>
          <td>{{ $item->correo }}</td>
          <td>{{ $item->ciudad }}</td>
          <td>
              <a class="btn btn-info"    href="{{ route('ProveedoresCrud.show',$item->id) }}"><i class="fa fa-info-circle fa-1-5x" aria-hidden="true"></i></a>
              <a class="btn btn-warning" href="{{ route('ProveedoresCrud.edit',$item->id) }}"><i class="fa fa-pencil-square-o fa-1-5x" aria-hidden="true"></i></a>
              {!! Form::open(['method' => 'DELETE','route' => ['ProveedoresCrud.destroy', $item->id],'style'=>'display:inline']) !!}
              <button type="submit" name="button" class= "btn btn-danger"><i class="fa fa-trash fa-1-5x" aria-hidden="true"></i></button>
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
