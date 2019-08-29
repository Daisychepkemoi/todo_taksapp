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
                      @foreach($subtasks as $subtask)
                       <tr>
                        <td>{{$subtask->subtask_name}}</td>
{{--                         <td>{{$subtask->description}}</td>
 --}}                        <td>{{$subtask->status}}</td>
                      
                        <td><a href="/subtask/{{$subtask->id}}/saveeditedsubtask"><button class="btn-primary">Edit</button></a></td>
                        @if($subtask->status == 'incomplete')
                        <td><a href="/subtask/markcomplete/{{$subtask->id}}"><button class="btn-warning">Mark_as_Complete</button></a></td>
                        @else 
                           <td><a href="/subtask/markincomplete/{{$subtask->id}}"><button class="btn-warning">Mark_as_Incomplete</button></a></td>
                        @endif
                        <td><a href="/subtask/{{$subtask->id}}/delete"><button class="btn-danger">Delete</button></a></td>
                       
                        

                       </tr>
                       @endforeach
                       <tr>
                      <td colspan="4">{{$subtasks->links()}}</td>
                      
                    </tr>
                        </tbody>
                        </table>

</div>


    

            
            
        </div>

@endsection