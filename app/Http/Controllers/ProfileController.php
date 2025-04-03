<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        $userid = Auth::user()->id;
        $validateddata = $request->validated();
        $validateddata["user_id"] = $userid;
        if ($request->hasFile("image")) {
            $image_name =  $file = $request->file("image")->store("profile_images", "public");
            $validateddata["image"] = $image_name;


        }
        $data = Profile::create($validateddata);

        return response()->json(["message" => "profile created succesfully", "profile" => $data, "profile" => $data], 200);
    }
    public function update(StoreProfileRequest $request)
    {
        $data = Profile::update($request->validated());

        return response()->json(["update profile successfully" => "profile created succesfully", "profile" => $data], 200);
    }
    // define function take user id and return profile
    public function show($id)
    {
        $profile = Profile::where("user_id", $id)->first();
        return response()->json(["message" => "successfully ", "profile" => $profile]);
    }
}
