<?php

namespace App\Http\Controllers;

use App\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use DB;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view("tasks.createtask");
    }
    public function show()
    {
        $user = auth()->user();
        $tasks = Tasks::where('user_id',$user->id)->paginate(10);
        return view("tasks.viewtasks", compact("tasks"));
    }
    public function edittask($id)
    {
        $user = auth()->user();
        $task = Tasks::find($id);
        return view("tasks.edittask", compact("task"));
    }
     public function saveeditedtask($id)
    {
       $user = auth()->user();
       $task = Tasks::find($id);
        $task->task_name = request('task_name');
        $task->description = request('description');
        $task->status = request('status');
        $task->datedue = request('datedue');
        $task->user_id = $user->id;
        $task->save();
        return redirect('/viewtasks')->with('success', 'Task details edited successfully');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $user = auth()->user();
        $validator = Validator::make($request->all(), [
            'task_name' => 'required|unique:tasks|max:120',
            // 'description' => 'required|unique:tasks|max:120',
        ]);
         if ($validator->fails()) {
            return redirect('/createtask')
                        ->withErrors($validator)
                        ->withInput();
         }
         else{
            $task = new Tasks;
            $task->task_name = $request->task_name;
            $task->description = $request->description;
            $task->datedue = $request->datedue;
            $task->user_id = $user->id;
            $task->save();
            }

        return redirect("/viewtasks")->with("success","task created successfully");
}

   

   
    public function complete()
    {
        $user = auth()->user();
        $tasks = Tasks::where('user_id',$user->id)->where('status', 'complete')->paginate(10);
        return view('tasks.completed', compact('user','tasks'));
    }
    public function incomplete()
    {
        $user = auth()->user();
        $tasks = Tasks::where('user_id',$user->id)->where('status', 'incomplete')->paginate(10);
        return view('tasks.completed', compact('user','tasks'));
    }
     public function markincomplete($id)
    {
        $user = auth()->user();
         DB::table('tasks')->where('id', $id)->update(['status' => 'incomplete']);

        $tasks = Tasks::where('user_id',$user->id)->first();
        return redirect('/viewtasks')->with('success','Task Status updated successfully');
    }
     public function markcomplete($id)
    {
        $user = auth()->user();
         DB::table('tasks')->where('id', $id)->update(['status' =>'complete']);
        $tasks = Tasks::where('user_id',$user->id)->where('id', $id)->where('status', 'incomplete')->first();
        return redirect('/viewtasks')->with('success','Task Status updated successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $user = auth()->user();
        DB::table('tasks')->where('id', $id)->delete();
        DB::table('subtasks')->where('task_id', $id)->delete();
        return redirect('/viewtasks')->with('danger', 'task deleted successfully');
     }
    
}
