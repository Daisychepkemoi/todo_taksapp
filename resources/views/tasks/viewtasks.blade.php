@extends('layouts.app')

@section('content')
<div style="position: center; width: 75%;margin-left: 12.5%;margin-top: 50px;">
   <div class="navsbar">
       @if (session()->has('success'))
       <div class="alert alert-info">
        {{ session('success') }}
        @endif
        @if (session()->has('danger'))
       <div class="alert alert-danger">
        {{ session('danger') }}
        @endif
      </div>
<div class="card">
  <div class="card-header text-white bg-success ">
    View Task
  </div>
  <div class="card-body">
    <table class="table table-bordered" style="width:75%;margin-left: 12.5%;margin-top: 20px;">
                 
                     <thead>
                        <tr class="bg-success">
                        
                          <th scope="col">Task Name</th>
                          <th scope="col">Task Description</th>
                          <th scope="col">Task Status</th>
                          <th col-span="2">Task Status</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($tasks as $task)
                       <tr>
                        <td>{{$task->task_name}}</td>
                        <td>{{$task->description}}</td>
                        <td>{{$task->status}}</td>
                        <td><a href="task/{{$task->id}}/viewdetails"><button class="btn-info">View</button></a></td>
                        <td><a href="task/{{$task->id}}/edittask"><button class="btn-primary">Edit</button></a></td>
                        <td><a href="task/{{$task->id}}/delete"><button class="btn-danger">Delete</button></a></td>
                       
                        

                       </tr>
                       @endforeach
                       <tr>
                      <td colspan="4">{{$tasks->links()}}</td>
                      
                    </tr>
                        </tbody>
                        </table>

</div>
</div>

    

            
            
        </div>

@endsection