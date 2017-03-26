<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Http\Requests;

class ClientesCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
      $items = Clientes::orderBy('id','DESC')->paginate(5);
        return view('CRUD.ClientesCrud.index',compact('items'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
      return view ('CRUD.ClientesCrud.create');
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

          Clientes::create($request->all());
          return redirect()->route('ClientesCrud.index')
                          ->with('success','Cliente creada con exito');
    }

    public function show($id)
    {
      
    }

    public function filter(Request $request)
    {
      $clientes = Clientes::where('nombres', '=',$request['filtrar'])->orderBy('id','DESC')->paginate(10);
      return view('CRUD.ClientesCrud.index',compact('clientes'));
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

          Clientes::create($request->all());
          return redirect()->route('ClientesCrud.index')
                          ->with('success','Cliente creada con exito');
    }

    public function destroy($id)
    {
      Clientes::find($id)->delete();
          return redirect()->route('ClientesCrud.index')
                          ->with('success','Cliente eliminado con exito');
    }
}
