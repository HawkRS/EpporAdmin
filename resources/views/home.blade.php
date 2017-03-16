@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Tareas pendientes</div>

                <div class="panel-body">
                    <table class="table table-hover">
                      <thead class="table-">
                        <tr>
                          <th>Tarea</th>
                          <th>Creador</th>
                          <th>Fecha</th>
                          <th>Hora</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Enviar cotizacion a John Doe</td>
                          <td>Carlos</td>
                          <td>18 mar</td>
                          <td>11:00 AM</td>
                          <td>
                            <button type="button" name="button" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
                            <button type="button" name="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                  <button type="button" name="button" class="btn center-block btn-lg btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Crear</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
