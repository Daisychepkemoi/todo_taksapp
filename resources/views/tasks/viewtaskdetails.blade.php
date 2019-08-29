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
     Task Name
  </div>
  <div class="card-body">
    <h3>SubTasks</h3>
  <div class="form-group row">
      
  </div>
  <div class="form-group row">
    
  </div>
  



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