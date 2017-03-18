@extends('layouts.app')

@section('content')
<section class="main-section">
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="pull-left">
          <h2>Editar tarea</h2>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="panel-body">

      @if (count($errors) > 0)
          <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      {!! Form::model($item, ['method' => 'PATCH','route' => ['TaskCrud.update', $item->id]]) !!}
      {{ csrf_field() }}
      <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Tarea:</strong>
                  {!! Form::text('tarea', null, array('placeholder' => '$item->tarea','class' => 'form-control')) !!}
              </div>
          </div>
          {{ Form::hidden('creador', Auth::user()->name ) }}
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Comentarios:</strong>
                  {!! Form::textarea('comentarios', null, array('placeholder' => '$item->comentarios','class' => 'form-control','style'=>'height:100px')) !!}
              </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="act-btn">
              <button type="submit" class="btn btn-info tbtn mh-45">Editar</button>
              <a class="btn btn-primary tbtn mh-45" href="{{ route('TaskCrud.index') }}">Volver</a>
            </div>
          </div>

      </div>{{-- END ROW --}}

      {!! Form::close() !!}

    </div>{{--END PANEL BODY--}}

  </div>{{--END PANEL--}}

</section>

@endsection
