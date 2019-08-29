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
        return view("tasks.createtask");
    }
    public function show()
    {
        $tasks = Tasks::paginate(10);
        return view("tasks.viewtasks", compact("tasks"));
    }
    public function edittask($id)
    {
        $task = Tasks::find($id);
        return view("tasks.edittask", compact("task"));
    }
     public function saveeditedtask($id)
    {
       $task = Tasks::find($id);
        $task->task_name = request('task_name');
        $task->description = request('description');
        $task->status = request('status');
        $task->save();
        return redirect('/viewtasks')->with('success', 'Task details edited successfully');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            $task->save();
            }

        return redirect("/createtask")->with("success","task created successfully");
}

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $tasks)
    {
        //
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
        DB::table('tasks')->where('id', $id)->delete();
        DB::table('subtasks')->where('task_id', $id)->delete();
        return redirect('/viewtasks')->with('danger', 'task deleted successfully');
     }
    
}
