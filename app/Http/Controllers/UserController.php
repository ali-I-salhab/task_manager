<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(int $id )
    {

      if($id >= 10){
        return response()->json("you cant resgister ",500);
      }else{
        return response()->json("accessable",200);
      }


    }
}
