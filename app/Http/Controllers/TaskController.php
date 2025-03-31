<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{

    public function index(){
        $tasks = Task::all();
        return response()->json($tasks);
    }
    public function store(Request $request){

        $respo=   Task::create(
               [
                   "tit"=> $request->tit,
                   "des"=> $request->des,
                   "prio"=> $request->prio,
               ]
           );

           return response()->json($respo,200);
       }

}
