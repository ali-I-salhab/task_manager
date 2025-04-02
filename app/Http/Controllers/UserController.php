<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Task;
use App\Models\Task as ModelsTask;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // echo implode($request->only('email','password'));
        // echo Auth::attempt($request->only('email','password'));

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
    public function logout(){}
    public function register(Request $request){
    $request->validate([
        "name"=>"required|string|max:255",
        "email"=> "required|string|email|max:255|unique:users,email",
        "password"=>"required|string|min:8|confirmed"
    ]);
   $user= User::create([
        "name"=> $request->name,
        "email"=> $request->email,
        "password"=>Hash::make($request->password),
    ]);
    return response()->json(["status"=> "success","user"=>$user]);
    }


    public function getprofile(int $id){
        echo"---------------------$id";
        $profile=User::find($id)->profile;


        return response()->json($profile,200);
    }

}
