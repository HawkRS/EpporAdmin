<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TaskCrudController extends Controller
{
  public function index(Request $request)
  {
    $items = Item::orderBy('id','DESC')->paginate(10);
        return view('TaskCrud.index',compact('items'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
  }
  public function create()
  {
    return view('TaskCrud.create');
  }
  public function store(Request $request)
  {
    $this->validate($request, [
            'tarea' => 'required',
            'creador' => 'required',
            'comentarios' => 'required',
        ]);

        Item::create($request->all());
        return redirect()->route('TaskCrud.index')
                        ->with('success','Tarea creada con exito');
  }
  public function show($id)
  {
    $item = Item::find($id);
        return view('TaskCrud.show',compact('item'));
  }
  public function edit($id)
  {
    $item = Item::find($id);
            return view('TaskCrud.edit',compact('item'));
  }
  ublic function update(Request $request, $id)
  {
    $this->validate($request, [
            'tarea' => 'required',
            'creador' => 'required',
            'comentarios' => 'required',
        ]);

        Item::find($id)->update($request->all());
        return redirect()->route('TaskCrud.index')
                        ->with('success','Tarea editada con exito');
  }
  public function delete($id)
  {
    Item::find($id)->delete();
        return redirect()->route('TaskCrud.index')
                        ->with('success','Item deleted successfully');
  }
}
