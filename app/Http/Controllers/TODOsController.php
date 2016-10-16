<?php

namespace App\Http\Controllers;

use Auth;
use App\Todo;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\Todo\CreateTodoRequest;
use App\Http\Requests\Todo\UpdateTodoRequest;

class TODOsController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $list = Auth::user()->todos()->orderBy('updated_at', 'desc')->paginate(10);
    return view('todos.index', compact('list'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('todos.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(CreateTodoRequest $request)
  {
    Auth::user()->todos()->create($request->only(['todo']));

    notify()->flash('Todo '. $request->id .' successfully created.', 'success');
    return redirect()->action('TODOsController@index');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show(Todo $todo)
  {
    return view('todos.show', compact('todo'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit(Todo $todo)
  {
    return view('todos.edit', compact('todo'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(UpdateTodoRequest $request, Todo $todo)
  {
    $todo->update($request->only(['todo']));
    notify()->flash('Todo '. $request->id .' successfully updated.', 'success');
    return redirect()->action('TODOsController@index');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(Todo $todo)
  {
    $todo->delete();

    notify()->flash('Todo '. $todo->id .' successfully deleted.', 'success');
    return redirect()->action('TODOsController@index');
  }
}
