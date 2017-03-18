<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests;

class TaskCrudController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }


  public function index(Request $request)
  {
    $items = Task::orderBy('id','DESC')->paginate(10);
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

        Task::create($request->all());
        return redirect()->route('TaskCrud.index')
                        ->with('success','Tarea creada con exito');
  }
  public function show($id)
  {
    $item = Task::find($id);
        return view('TaskCrud.show',compact('item'));
  }
  public function edit($id)
  {
    $item = Task::find($id);
            return view('TaskCrud.edit',compact('item'));
  }
  public function update(Request $request, $id)
  {
    $this->validate($request, [
            'tarea' => 'required',
            'creador' => 'required',
            'comentarios' => 'required',
        ]);

        Task::find($id)->update($request->all());
        return redirect()->route('TaskCrud.index')
                        ->with('success','Tarea editada con exito');
  }
  public function destroy($id)
  {
    Task::find($id)->delete();
        return redirect()->route('TaskCrud.index')
                        ->with('success','Tarea eliminada con exito');
  }
}
