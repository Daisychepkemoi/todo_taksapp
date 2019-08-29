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
                    <li class="list-group-item"><a href="">View Completed Tasks</a></li>
                    <li class="list-group-item"><a href="">View InProgress Tasks</a></li>
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
