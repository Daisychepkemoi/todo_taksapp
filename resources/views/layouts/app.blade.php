{{-- @extends('layouts.app')

@section('content') --}}


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>home.todotaskapp</title>
  </head>
  <body>
   

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">TodoTaskApp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
      </li>
      @auth
      <li class="nav-item">
        <a class="nav-link" href="/viewtasks">MyTasks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/task/completed">Completed Tasks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/task/incomplete">InCompleted Tasks</a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="/task/incomplete">Overdue Tasks</a>
      </li> --}}
        <li class="nav-item">
        <a class="nav-link" href="/createtask">New Tasks</a>
      </li>
       
                    
      
       </ul>
       <ul class="navbar-nav " style="float: right;">
       
     @endauth
    
    
      @guest
         <li class="nav-item navbar-right" style="float: right">
             <a class="nav-link" href="{{ route('login') }}">Login</a>
         </li>
         <li class="nav-item navbar-right" style="float: right">
             <a class="nav-link" href="{{ route('register') }}">Register</a>
         </li>

     @if (Route::has('register'))
                               
    @endif
     @else
         <li class="nav-item ">
          <a class="nav-link " href="#">{{ Auth::user()->name }}</a>
         
        </li>
             <li class="nav-item ">
                <a class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">Logout</a>
                                
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                    </form>
             </li>

                                
        @endguest
          </ul>
  </div>
</nav> 
<div style="background-image: url({{asset('storage/back01.jpg')}}); height: 900px; background-size: cover; opacity:;">
  
   {{-- <img src="{{ URL::to('image/logoo.jpg') }}" style="background-image:;width: 200px; background-color: ; height:60px; margin-left: 5px; margin-top:-5px; background-color:;"> --}}
   @yield('content')  

</div> 
  </body>
</html>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <div>
                    <a href="/companies"><button>View All  Companies</button></a> <br>
                    <a href="/companies/employees"><button>View All Company Employees for all regions</button></a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- @endsection --}}
