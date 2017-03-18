@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crear nueva tarea</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('TaskCrud.index') }}"> Volver</a>
            </div>
        </div>
    </div>

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
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>
    {!! Form::close() !!}

@endsection
