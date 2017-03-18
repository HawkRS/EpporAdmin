@extends('layouts.app')

@section('content')
<section class="main-section">

  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="pull-left">
          <h2>Tareas</h2>
      </div>
      <div class="clearfix"></div>
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
              <th>Tarea</th>
              <th>Creador</th>
              <th>Comentarios</th>
              <th width="280px">Action</th>
          </tr>
      @foreach ($items as $key => $item)
      <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $item->tarea }}</td>
          <td>{{ $item->creador }}</td>
          <td>{{ $item->comentarios }}</td>
          <td>
              <a class="btn btn-info" href="{{ route('TaskCrud.edit',$item->id) }}">Edit</a>
              {!! Form::open(['method' => 'DELETE','route' => ['TaskCrud.destroy', $item->id],'style'=>'display:inline']) !!}
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

<section class="main-section">
  <div class="panel panel-default">
    <div class="mh-20 center-block">
        <h4>Crear nueva tarea</h4>
    </div>

    <div class="panel-body">
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

      {!! Form::open(array('route' => 'TaskCrud.store','method'=>'POST')) !!}
      {{ csrf_field() }}
      <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Tarea:</strong>
                  {!! Form::text('tarea', null, array('placeholder' => 'Escribe la tarea pendiente','class' => 'form-control')) !!}
              </div>
          </div>

          {{ Form::hidden('creador', Auth::user()->name ) }}

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Comentarios:</strong>
                  {!! Form::textarea('comentarios', null, array('placeholder' => 'Comentarios','class' => 'form-control','style'=>'height:100px')) !!}
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="act-btn">
              <button type="submit" class="btn btn-success tbtn mh-45">Crear</button>
              <a class="btn btn-primary tbtn mh-45" href="{{ url('/') }}">Volver</a>
            </div>
          </div>

      </div>
      {!! Form::close() !!}

    </div>
  </div>
</section>
@endsection
