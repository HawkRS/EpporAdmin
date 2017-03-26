<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedores;
use App\Http\Requests;

class ProveedoresCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
      $items = Proveedores::orderBy('id','DESC')->paginate(5);
        return view('CRUD.ProveedoresCrud.index',compact('items'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
      return view ('CRUD.ProveedoresCrud.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
              'nombres' => 'required',
              'direccion' => 'required',
              'colonia' => 'required',
              'ciudad' => 'required',
              'estado' => 'required',
              'telefono' => 'required',
              'correo' => 'required',
              'codigop' => 'required',
              'contacto' => 'required',
              'razon_social' => 'required',
              'rfc' => 'required'
          ]);

          Proveedores::create($request->all());
          return redirect()->route('ProveedoresCrud.index')
                          ->with('success','Proveedor creado con exito');
    }

    public function show($id)
    {
      $item = Proveedores::find($id);
      return view('CRUD.ProveedoresCrud.show',compact('item'));
    }

    public function filter(Request $request)
    {
      $proveedores = Proveedores::where('nombres', '=',$request['filtrar'])->orderBy('id','DESC')->paginate(10);
      return view('CRUD.ProveedoresCrud.index',compact('proveedores'));
    }

    public function edit($id)
    {
        $item = Proveedores::find($id);
        return view('CRUD.ProveedoresCrud.edit',compact('item'));
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
              'nombres' => 'required',
              'direccion' => 'required',
              'colonia' => 'required',
              'ciudad' => 'required',
              'estado' => 'required',
              'telefono' => 'required',
              'correo' => 'required',
              'codigop' => 'required',
              'contacto' => 'required',
              'razon_social' => 'required',
              'rfc' => 'required'
          ]);

          Proveedores::create($request->all());
          return redirect()->route('ProveedoresCrud.index')
                          ->with('success','Proveedor creada con exito');
    }

    public function destroy($id)
    {
      Proveedores::find($id)->delete();
          return redirect()->route('CRUD.ProveedoresCrud.index')
                          ->with('success','Proveedor eliminado con exito');
    }
}
