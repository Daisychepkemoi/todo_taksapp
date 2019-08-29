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
    Edit {{$subtask->subtask_name}} SubTask
  </div>
  <div class="card-body">

<form method="POST" action="/subtask/{{$subtask->id}}/saveeditedsubtaskk" enctype="multipart/form-data">
    @csrf
  <div class="form-group row">
    <label for="inputEmail3" class="col-md-6 col-form-label">Task Name</label>
    <div class="col-sm-10">
      <input type="text" name="subtask_name" class="form-control" value="{{$subtask->subtask_name}}"  id="inputEmail3" placeholder="subTask Name">
    </div>
  </div>
  {{-- <div class="form-group row">
    <label for="inputPassword3" class="col-md-6 col-form-label"> Task Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="description" value="{{$task->description}}"  id="inputPassword3" placeholder="Task Description">
    </div> --}}
  {{-- </div> --}}
   <div class="form-group row">
    <label for="inputPassword3" class="col-md-6 col-form-label"> Task DateDue</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="datedue" value="{{$subtask->datedue}}"  id="inputPassword3" placeholder="SubTask dateDue">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-md-6 col-form-label"> Task Status</label>
    <div class="col-sm-10">
      <select name="status">
        <option>{{$subtask->status}}</option>
        @if($subtask->status == "complete")
        <option>incomplete</option>

        @else
         <option>complete</option>
         @endif

      </select>
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
      <button type="submit" class="btn btn-primary">Save Changes</button>
      <button type="submit" class="btn btn-wrning">Cancel</button>
    </div>
  </div>
</form>
</div>
</div>

    

            
            
        </div>

@endsection