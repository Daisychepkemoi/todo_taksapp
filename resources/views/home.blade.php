@extends('layouts.app')
@section('content')
<div style="background-image: url({{asset('strog/back1.jpg')}}); height: 900px; background-size: cover; opacity:;">

    <h1 style="margin-top: 200px; float: left; margin-left: 30%; color: yellow; font-size: 40px;font-weight: bolder;">Welcome to TodoTasks App</h1><br><br><br><br>
    <h3 style="padding-top: 200px;  margin-left: 40%; color: yellow; font-size: 30px;font-weight: bold;"> 
        
        Click Here to View <a href="/viewtasks">Your Tasks</a>  <br>  Or  <a href="/createtask"><button>Create New Tasks</button> </a> </h3>
</div>
  
@endsection
{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-header">Wecome Daisy</div>
                <div class="card-header"></div>
                <div class="card" style="width: 18rem;">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="/createtask" class=""> <button class="btn-success">Create New Task</button></a></li>
                    <li class="list-group-item"><a href="/viewtasks">View All Tasks</a></li>
                    <li class="list-group-item"><a href="/task/completed">View Completed Tasks</a></li>
                    <li class="list-group-item"><a href="task/incomplete">View InProgress Tasks</a></li>
                    <li class="list-group-item"><a href="">View Overdue Tasks</a></li>
                    
                   
                  </ul>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}