@extends('layouts.app')
@section('content')
<div style="background-image: url({{asset('strog/back1.jpg')}}); height: 900px; background-size: cover; opacity:;">

    <h1 style="margin-top: 200px; float: left; margin-left: 30%; color: yellow; font-size: 40px;font-weight: bolder;">Welcome to Mini_CRM</h1><br><br><br><br>
    <h3 style="padding-top: 220px;  margin-left: 40%; color: yellow; font-size: 30px;font-weight: bold;"> 
        @if(!auth()->user())
        Please <a href="{{ route('login') }}">Login</a>  To continue</h3>
        @endif 
</div>
  
@endsection