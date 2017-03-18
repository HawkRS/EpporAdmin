@extends('layouts.app')

@section('content')
<section class="main-section">
  <div class="pull-left">
      <h2>Tareas</h2>
  </div>
  <div class="clearfix"></div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="act-btn">
          <a class="btn btn-success tbtn mh-45" href="{{ route('TaskCrud.create') }}"> Crear</a>
          <a class="btn btn-primary tbtn mh-45" href="{{ route('TaskCrud.create') }}">Volver</a>
      </div>
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
              <a class="btn btn-info" href="{{ route('TaskCrud.show',$item->id) }}">Show</a>
              <a class="btn btn-primary" href="{{ route('TaskCrud.edit',$item->id) }}">Edit</a>
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
@endsection
