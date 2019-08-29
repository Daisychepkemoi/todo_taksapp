@extends('layouts.app')

@section('content')
<div style="position: center; width: 75%;margin-left: 12.5%;margin-top: 50px;">
   <div class="navsbar">
       @if (session()->has('success'))
       <div class="alert alert-info">
        {{ session('success') }}
        @endif
      </div>
<div class="card">
  <div class="card-header text-white bg-success ">
     Subtasks To {{$task->task_name}} Task
  </div>
  <div class="card-body">
    <div style="width: 800px !important; background-color: ;">
    <table class="table table-bordered" style="margin-left:;margin-top: 20px;">
                 
                     <thead>
                        <tr class="bg-success">
                        
                          <th scope="col">SubTask_Name</th>
                          {{-- <th scope="col">SubTask_Description</th> --}}
                          <th scope="col">SubTask_Status</th>
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


<form method="POST" action="/savetask/{{$task->id}}/subtask" enctype="multipart/form-data">
    @csrf
  
   <div class="form-group row">
      <div class="card-body" >
      <div class="card-header text-black bg-warning ">
        Create Sub Task
        </div> 
  <div style="width: 500px !important; background-color: ; margin-left: 200px;">
         
     <label for="inputEmail3" class="col-md-4 col-form-label">Sub Task  </label>

        <input type="text" name="subtask_name1" class="form-control" id="inputEmail3" placeholder="Sub Task Name" required="">

          <input type="date" class="form-control" name="datedue1" id="inputPassword3" min={{$mindate}} placeholder="Task Description" required="">

            <label for="inputEmail3" class="col-md-4 col-form-label">Sub Task </label>

        <input type="date" name="subtask_name2" class="form-control" id="inputEmail3" min="{{$mindate}}" placeholder="Sub Task Name">
         <input type="date" class="form-control" name="datedue2" value="{{ old('datedue') }}"  id="inputPassword3" placeholder="Task Description">
            <label for="inputEmail3" class="col-md-4 col-form-label">Sub Task </label>
            <input type="text" name="subtask_name3" class="form-control"value="{{ old('subtask_name') }}"  id="inputEmail3" placeholder="Sub Task Name">
             <input type="date" class="form-control" min="{{$mindate}}" name="datedue3" value="{{ old('datedue') }}"  id="inputPassword3" placeholder="Task Description">
       
     
  </div>

           

      </div>

  </div>

  

        @if ($errors->any())
                 <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                               @endif


  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>
</div>
</div>

    

            
            
        </div>

@endsection