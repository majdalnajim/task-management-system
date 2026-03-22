<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TestController extends Controller
{
   
    public function store(Request $request){
$request->validate([
            "title"=>"required|min:3",
            "description"=>"required"
        ]);
Task::create([
            "title"=>$request->title,
            "description"=>$request->description
        ]);
        return "the task successfuly add";
    }
    public function delete($id){
        Task::find($id)?->delete();
        return "successfuly deleted";
    }
    public function update($id ,Request $request){
        $task=Task::find($id);
        if(!$task){
            return"the task id not found";
        }
       $task->update([
        "title"=>$request->title,
            "description"=>$request->description
       ]);
       return "the task successfuly update";
    }
    public function showForm(){
        $tasks=Task::all();
        return view("tasks",compact("tasks"));
    }
}
