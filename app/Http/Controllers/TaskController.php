<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Category;
use App\Models\Task;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class TaskController extends Controller

{public function getorderedalltasks(){

    $user=Auth::user();
        $tasks = $user->tasks()->orderByRaw("FIELD(prio,'low','medium','high')")->get();
        return response()->json($tasks);
}
public function getfavoritetasks(){

    $user=Auth::user();

        $tasks = $user->favorites;
        return response()->json(["message"=> "sucess","data"=> $tasks]);

}
public function addtofavorite($taskid){
    Auth::user()->favorites()->syncWithoutDetaching($taskid);
    return response()->json(["status"=> "success"]);
}
public function removefromfavorite($taskid){
    Auth::user()->favorites()->detach($taskid);
    return response()->json(["status"=> "success"]);
}
    public function index()
    {$user=Auth::user();
        $tasks = $user->tasks;
        return response()->json($tasks);
    }
    public function getalltasks(){
        $tasks = Task::all();
        return response()->json($tasks);
    }
    //
    public function getcategoriestotask(int $taskid)
    {
        $task = Task::findOrFail($taskid);
        return response()->json($task->categories);
    }

    public function gettaskstocategories($catid)
    {
        // echo"$catid";
        $cat = Category::findOrFail($catid);
        return response()->json($cat->tasks);
    }
    public function addtaskstocategories(int $catid, Request $request)
    {

        $cat = Category::findOrFail($catid);
        $cat->tasks()->attach($request->task_id);


        return response()->json("successfully", 200);
    }
    public function addcategoriestotask(int $taskid, Request $request)
    {

        $task = Task::findOrFail($taskid);
        $task->categories()->attach($request->category_id);


        return response()->json("successfully", 200);
    }
    public function update(int $id, UpdateTaskRequest $request)
    {
        $task = Task::findOrFail($id);
        echo $task;
        echo "------------------------";
        echo Auth::user()->id;
        if($task->user_id==Auth::user()->id){
            $task->update(
                $request->validated()
            );


            return response()->json($task);
        }else{
            return response()->json(["message"=>"forbidden"],403);

        }




    }
    public function destroy(int $id)
    {
    try{
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message'=>'deleted was successfully'], 200);
    }catch(ModelNotFoundException $e){
        return response()->json(['message'=>'not found',"details"=>$e], 404);
    }
    catch(Exception $e){
        return response()->json(['message'=>'not found',"details"=>$e],  404);
    }
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
        //    $data= $request->validate([
        //         "tit" =>"required|string|min:5|max:10",
        //         "des" => "nullable|string",
        //         "prio" => "required|integer|min:1|max:5"]);

        $user=Auth::user();

$validateddata=$request->validated();
$validateddata['user_id']=$user->id;
        $respo =   Task::create($validateddata);
        $data=$request->validated();
        $data["user_id"]=Auth::user()->id;

        $respo =   Task::create(
            $data
        );

        return response()->json($validateddata, 400);
        return response()->json($respo, 201);
    }
}
