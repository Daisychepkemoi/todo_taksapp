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
   My Tasks
  </div>
  
    <table class="table table-bordered" style="width:75%;margin-left: 12.5%;margin-top: 20px;">
                 
                     <thead>
                        <tr class="bg-success">
                        
                          <th scope="col">Task_Name</th>
                          <th scope="col">Task_Description</th>
                          <th scope="col">Task_Status</th>
                          <th colspan="4" class="text-center"> Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($tasks as $task)
                       <tr>
                        <td>{{$task->task_name}}</td>
                        <td>{{$task->description}}</td>
                        <td>{{$task->status}}</td>
                      <!--   <td><a href="task/{{$task->id}}/viewdetails"><button class="btn-info">View</button></a></td> -->
                        <td><a href="task/{{$task->id}}/edittask"><button class="btn-primary">View/Edit</button></a></td>
                        @if($task->status == 'incomplete')
                        <td><a href="task/{{$task->id}}/edittask"><button class="btn-warning">Mark_as Complete</button></a></td>
                        @else 
                           <td><a href="task/{{$task->id}}/edittask"><button class="btn-warning">Mark_as Incomplete</button></a></td>
                        @endif
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

@endsection