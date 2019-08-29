<?php

namespace App\Http\Controllers;

use App\subtasks;
use App\Tasks;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;

class SubtasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = auth()->user();
        $task = Tasks::find($id);
        $subtasks = subtasks::where('task_id',$id)->paginate(10);
        // dd($task->task_name);
        $mindate = now();

        return view('tasks.addsubtasks', compact('user','subtasks','task','mindate'));
    }
      public function editsubtask($id)
    {
        $user = auth()->user();
        // $task = Tasks::find($id);
        $subtask = subtasks::find($id);
        return view("tasks.editsubtask", compact("subtask"));
    }
    public function saveeditedtask($id)
    {
       $user = auth()->user();
       $subtask = subtasks::find($id);
        $subtask->subtask_name = request('subtask_name');
        $subtask->status = request('status');
        $subtask->datedue = request('datedue');
        $subtask->save();
        $taskid = subtasks::where('id',$id)->first();
        // dd($taskid);
        return redirect('/task/'.$taskid->task_id.'/viewdetails')->with('success', 'SubTask details edited successfully');
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

    
    public function store($id,Request $request)
    {
        $user = auth()->user();

        // $validator = Validator::make($request->all(), [
        //     'task_name' => 'required|unique:tasks|max:120',
        //     // 'description' => 'required|unique:tasks|max:120',
        // ]);
        //  if ($validator->fails()) {
        //     return redirect('/task/'.$id.'/viewdetails')
        //                 ->withErrors($validator)
        //                 ->withInput();
        //  }
        //  else{
            $subtask = new subtasks;
            $subtask->subtask_name = $request->subtask_name1;
            $subtask->datedue = $request->datedue1;
            $subtask->user_id = $user->id;
            $subtask->task_id = $id;
            $subtask->save();
            if($request->subtask_name2 !== null){
             $subtask = new subtasks;
            $subtask->subtask_name = $request->subtask_name2;
            $subtask->datedue = $request->datedue2;
            $subtask->user_id = $user->id;
            $subtask->task_id = $id;
            $subtask->save();
            }
             if($request->subtask_name3 !== null){
           
            $subtask = new subtasks;
            $subtask->subtask_name = $request->subtask_name3;
            $subtask->datedue = $request->datedue3;
            $subtask->user_id = $user->id;
            $subtask->task_id = $id;
            $subtask->save();
            }
            $subtasks = subtasks::latest()->paginate();
        // }
        return view("tasks.viewsubtasks", compact('user','subtasks'))->with("success","task created successfully");
    }

   public function markincomplete($id)
    {
        $user = auth()->user();
         DB::table('subtasks')->where('id', $id)->update(['status' => 'incomplete']);

         $taskid = subtasks::where('id',$id)->first();
        return redirect('/task/'.$taskid->task_id.'/viewdetails')->with('success','SubTask Status updated successfully');
    }
     public function markcomplete($id)
    {
        $user = auth()->user();
         DB::table('subtasks')->where('id', $id)->update(['status' =>'complete']);
        $taskid = subtasks::where('id',$id)->first();
        return redirect('/task/'.$taskid->task_id.'/viewdetails')->with('success','SubTask Status updated successfully');

        

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subtasks  $subtasks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $user = auth()->user();
          $taskid = subtasks::where('id',$id)->first();
        DB::table('subtasks')->where('id', $id)->delete();

        // dd($taskid);
        return redirect('/task/'.$taskid->task_id.'/viewdetails')->with('danger', 'SubTask details deleted successfully');
    }
}
