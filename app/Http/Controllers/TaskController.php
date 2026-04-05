<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search=$request->search ?? ""; 
         $tasks=Task::where("user_id",auth()->id())->where("title","like","%".$search."%")->paginate(5)->withQueryString();
        return view("tasks",compact("tasks","search"));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
               $request->validate([
            "title"=>"required|min:3",
            "description"=>"required",
        ]);
Task::create([
            "title"=>$request->title,
            "description"=>$request->description,
            "is_complected"=>$request->has("is_complected"),
            "user_id"=>auth()->id(),
        ]);
        return redirect("/tasks")->with("success","Task created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Task $task )
    {
        if($task->user_id!=auth()->id()){
            abort(403);
        }
        
        return view("edit",compact("task"));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Task $task)
    {
        
         if($task->user_id!=auth()->id()){
            abort(403);
        }
         
        $task->update([
        "title"=>$request->title,
        "description"=>$request->description,
        "is_complected"=>$request->has("is_complected"),

       ]);
       return redirect("/tasks")->with("success","Task update successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Task $task)
    {
         if($task->user_id!=auth()->id()){
            abort(403);
        }
        
        Task::find($id)?->delete();
        return redirect("/tasks")->with("success","Task deleted successfully");
    }
}
