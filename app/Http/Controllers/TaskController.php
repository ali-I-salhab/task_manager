<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }
    public function update(int $id, Request $request)
    {
        $task = Task::findOrFail($id);



        $task->update(
            $request->all()
        );


        return response()->json($task);
    }
    public function destroy(int $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['deleted was successfully'], 200);
    }
    public function show(int $id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }
    public function store(StoreTaskRequest $request)
    {
        // validation of data
        // it is not true to write validadtion in the same page of controller
        // the better soloution is to write validation
        // use Form_request
        // php artisan make:request task
       $data= $request->validate([
            "tit" =>"required|string|min:5|max:10",
            "des" => "nullable|string",
            "prio" => "required|integer|min:1|max:5"]);



        $respo =   Task::create(
          $data
        );

        return response()->json($respo, 400);
    }
}
