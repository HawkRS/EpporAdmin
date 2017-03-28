@extends('layouts.app')

@section('content')

<section class="main-section">

  <div class="panel panel-default">

    <div class="panel-heading">
      <div class="pull-left">
          <h2>Crear Empleado</h2>
      </div>
      <div class="clearfix"></div>
    </div>

    <div class="panel-body">

      @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif

      @if (count($errors) > 0)
          <div class="alert alert-danger">
              <strong>Whoops!</strong> Existe algun problema con los datos ingresados.<br><br>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      {!! Form::open(array('route' => 'EmpleadosCrud.store','method'=>'POST')) !!}
      {{ csrf_field() }}
      <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Nombres:</strong>
                  {!! Form::text('nombres', null, array('class' => 'form-control')) !!}
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Apellidos:</strong>
                  {!! Form::text('apellidos', null, array('class' => 'form-control')) !!}
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Fecha de nacimiento:</strong>
                  {!! Form::text('nacimiento', null, array('class' => 'form-control')) !!}
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Direccion:</strong>
                  {!! Form::text('direccion', null, array('class' => 'form-control')) !!}
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Colonia:</strong>
                  {!! Form::text('colonia', null, array('class' => 'form-control')) !!}
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Telefono:</strong>
                  {!! Form::text('telefono', null, array('class' => 'form-control')) !!}
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Codigo Postal:</strong>
                  {!! Form::text('codigop', null, array('class' => 'form-control')) !!}
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Contacto de emergencia:</strong>
                  {!! Form::text('emergencia', null, array('class' => 'form-control')) !!}
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Telefono de emergencia:</strong>
                  {!! Form::text('emetelefono', null, array('class' => 'form-control')) !!}
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Estatus:</strong>
                  {!! Form::text('estado', null, array('class' => 'form-control')) !!}
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Entrada:</strong>
                  {!! Form::text('entrada', null, array('class' => 'form-control')) !!}
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Salida:</strong>
                  {!! Form::text('salida', null, array('class' => 'form-control')) !!}
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="act-btn">
              <button type="submit" class="btn btn-success tbtn mh-45">Crear</button>
              <a class="btn btn-primary tbtn mh-45" href="{{ route('EmpleadosCrud.index') }}">Volver</a>
            </div>
          </div>

      </div>
      {!! Form::close() !!}

    </div>

  </div>
</section>
@endsection
