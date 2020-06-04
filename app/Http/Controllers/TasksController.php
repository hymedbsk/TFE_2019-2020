<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
{
    $tasks = Task::all();
    return view('tasks.index', compact('tasks'));
}

public function create()
{
    return view('tasks.create');
}

public function store(Request $request)
{


    $task = new Task ;
    $task->name = $request->input('name');
    $task->description = $request->input('description');
    $task->task_date = $request->input('task_date');
    $task->task_end = $request->input('task_end');
    $task->color = $request->input('color');
    $task->save();



    return redirect()->route('tasks.index');


}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
