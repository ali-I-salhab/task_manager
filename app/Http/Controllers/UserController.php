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
    public function getusertasks($id){
        $tasks=User::find($id)->tasks;
        echo "-----------------";

        echo Task::find(1)->user;
 echo "-----------------";

        return response($tasks,200);

    }
    public function getprofile(int $id){
        echo"---------------------$id";
        $profile=User::find($id)->profile;


        return response()->json($profile,200);
    }
}
