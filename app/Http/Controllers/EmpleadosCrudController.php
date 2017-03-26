<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;
use App\Http\Requests;

class EmpleadosCrudController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(Request $request)
  {
    $items = Empleados::orderBy('id','DESC')->paginate(5);
      return view('CRUD.EmpleadosCrud.index',compact('items'))
          ->with('i', ($request->input('page', 1) - 1) * 5);
  }

  public function create()
  {
    return view ('CRUD.EmpleadosCrud.create');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
          'nombres' => 'required',
          'apellidos' => 'required',
          'nacimiento' => 'required',
          'direccion' => 'required',
          'colonia' => 'required',
          'telefono' => 'required',
          'codigop' => 'required',
          'emergencia' => 'required',
          'emetelefono' => 'required',
          'estado' => 'required',
          'entrada' => 'required',
        ]);

        Empleados::create($request->all());
        return redirect()->route('EmpleadosCrud.index')
                        ->with('success','Empleado creado con exito');
  }

  public function show($id)
  {
    $item = Empleados::find($id);
    return view('CRUD.EmpleadosCrud.show',compact('item'));
  }

  public function filter(Request $request)
  {
    $empleados = Empleados::where('nombres', '=',$request['filtrar'])->orderBy('id','DESC')->paginate(10);
    echo $empleados;
    return view('CRUD.EmpleadosCrud.index',compact('empleados'));
  }

  public function edit($id)
  {
      $item = Empleados::find($id);
      return view('CRUD.EmpleadosCrud.edit',compact('item'));
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
            'nombres' => 'required',
            'apellidos' => 'required',
            'nacimiento' => 'required',
            'direccion' => 'required',
            'colonia' => 'required',
            'telefono' => 'required',
            'codigop' => 'required',
            'emergencia' => 'required',
            'emetelefono' => 'required',
            'estado' => 'required',
            'entrada' => 'required',
        ]);

        Empleados::find($id)->update($request->all());
        return redirect()->route('EmpleadosCrud.index')
                        ->with('success','Empleado editado con exito');
  }

  public function destroy($id)
  {
    Empleados::find($id)->delete();
        return redirect()->route('EmpleadosCrud.index')
                        ->with('success','Empleado eliminado con exito');
  }
}
