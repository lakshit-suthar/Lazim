<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class TaskController extends Controller
{
    //
    function list() {
        
        try {
            $taskList = Task::orderBy('id','desc')->get();
            return response()->json([
                'status' => true,
                'data' => $taskList
                 ],200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ],500);
        }

    }

    public function store(Request $request)  {

        $validU = Validator::make($request->all(),[
            'name' => 'required',
            'status' => 'required',
         ]);
  
         if($validU -> fails()){
           return response()->json([
              'status' => false,
              'message' => 'Validation errors',
              'errors' => $validU->errors()
           ],401);
         }
        
         try {
            Task::create($request->post());
            return response()->json([
                'status' => true,
                'message' => 'Task created successfully'
             ],200);
         } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
             ],500);
         }
        
        // return redirect()->route('companies.index')->with('success','Company has been created successfully.');
    }
    
    public function edit($id)  {
        try {
            $task = Task::find($id);
            return response()->json([
                'status' => true,
                'data' => $task
             ],200);
         } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
             ],500);
         }
    }

    public function update(Request $request, $id)
    {
  //dd($id);
        // dd($request->all());
        $validU = Validator::make($request->all(),[
            'name' => 'required',
            'status' => 'required',
         ]);
  
         if($validU -> fails()){
           return response()->json([
              'status' => false,
              'message' => 'Validation errors',
              'errors' => $validU->errors()
           ],401);
         }

        try {
            $task = Task::find($id);
            $task->update($request->all());
            return response()->json([
                'status' => true,
                'data' => $task,
                'message' => 'Task updated successfully'
             ],200);
        } catch (\Throwable $th) {   
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
             ],500);
        }
    }

    public function destroy($id)
    {
        try {
            Task::destroy($id);
            return response()->json([
                'status' => true,
                'message' => 'Task deleted successfully'
             ],200);
        } catch (\Throwable $th) {   
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
             ],500);
        }
        
    }

}
