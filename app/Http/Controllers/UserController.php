<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Task;
use App\Models\Task as ModelsTask;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request){

     $respo=   ModelsTask::create(
            [
                "tit"=> $request->tit,
                "des"=> $request->des,
                "prio"=> $request->prio,
            ]
        );

        return response()->json($respo,200);
    }
}
