<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function store(StoreProfileRequest $request)
    {
        $data = Profile::create($request->validated());
        $user=User::find($data->user_id);
        return response()->json(["message" => "profile created succesfully", "user"=>$user,"profile" => $data], 200);
    }
    // define function take user id and return profile
    public function show($id){
        $profile=Profile::where("user_id",$id)->first();
        return response()->json(["message"=> "successfully ","profile"=>$profile]);
    }
}
