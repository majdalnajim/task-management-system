<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $tasks=Task::all();
        return view("tasks",compact("tasks"));
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
            "description"=>"required"
        ]);
Task::create([
            "title"=>$request->title,
            "description"=>$request->description
        ]);
        return redirect("/tasks")->with("success","the task was add");
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
    public function edit(string $id)
    {
        $task=Task::find($id);
        
        return view("edit",compact("task"));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $task=Task::find($id);
        $task->update([
        "title"=>$request->title,
        "description"=>$request->description
       ]);
       return redirect("/tasks")->with("success","the task was update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        Task::find($id)?->delete();
        return redirect("/tasks")->with("success","the task was delete");
    }
}
