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
    Create Task
  </div>
  <div class="card-body">

<form method="POST" action="/savetask" enctype="multipart/form-data">
    @csrf
  <div class="form-group row">
    <label for="inputEmail3" class="col-md-6 col-form-label">Task Name</label>
    <div class="col-sm-10">
      <input type="text" name="task_name" class="form-control"value="{{ old('task_name') }}"  id="inputEmail3" placeholder="Task Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-md-6 col-form-label"> Task Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="description" value="{{ old('description') }}"  id="inputPassword3" placeholder="Task Description">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-md-6 col-form-label"> Task's Date Due</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="datedue" value="{{ old('date') }}"  id="inputPassword3" placeholder="Task Description">
    </div>
  </div>
   {{-- <div class="form-group row">
      <div class="card-body" >
      <div class="card-header text-black bg-warning ">
        Create Sub Task
        </div> 
  <div style="width: 500px !important; background-color: ; margin-left: 200px;">
         
     <label for="inputEmail3" class="col-md-4 col-form-label">Sub Task  </label>

        <input type="text" name="task_name1" class="form-control"value="{{ old('subtask_name') }}"  id="inputEmail3" placeholder="Sub Task Name">
            <label for="inputEmail3" class="col-md-4 col-form-label">Sub Task </label> --}}

       {{--  <input type="text" name="task_name2" class="form-control"value="{{ old('subtask_name') }}"  id="inputEmail3" placeholder="Sub Task Name">
            <label for="inputEmail3" class="col-md-4 col-form-label">Sub Task </label>

        <input type="text" name="task_name3" class="form-control"value="{{ old('subtask_name') }}"  id="inputEmail3" placeholder="Sub Task Name">

        <input type="text" name="task_name4" class="form-control"value="{{ old('subtask_name') }}"  id="inputEmail3" placeholder="Sub Task Name">

        <input type="text" name="task_name5" class="form-control"value="{{ old('subtask_name') }}"  id="inputEmail3" placeholder="Sub Task Name">

        <input type="text" name="task_name6" class="form-control"value="{{ old('subtask_name') }}"  id="inputEmail3" placeholder="Sub Task Name">

        <input type="text" name="task_name7" class="form-control"value="{{ old('subtask_name') }}"  id="inputEmail3" placeholder="Sub Task Name"> --}}
     
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