<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks=Task::all();
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateRequest=Validator::make($request->all(),[
           'title'=>'required',
            'description'=>'max:300',
        ],[
            'title.required'=>'Task should have title',
            'description.max'=>'Description should not be more than 300 length'
        ]);

       if (!$validateRequest->fails()){
           $task=Task::create($request->all());
           return response()->json(['msg'=>'Task created successfully'],201);
       }else{
           return response()->json(['msg'=>$validateRequest->errors()],400);
       }
    }

    /**
     * Display the specified resource.
     */

    public function show(Task $task)
    {
        return response()->json($task,200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validateRequest=Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'max:300',
        ],[
            'title.required'=>'Task should have title',
            'description.max'=>'Description should not be more than 300 length'
        ]);

        if (!$validateRequest->fails()){
            $task->update($request->all());
            return response()->json(['msg'=>'Task updated successfully'],201);
        }else{
            return response()->json(['msg'=>$validateRequest->errors()],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(['msg'=>'Task deleted successfully'],200);
    }
}
