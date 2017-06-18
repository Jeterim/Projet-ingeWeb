@extends('layouts.app')

@section('title', 'INSA Potins')

@if(Auth::check())
@else
    @section('sidebar')
    @endsection
@endif

@section('content')

    @if(Auth::check())
    <h1>Dashboard</h1>
    Your dashboard, the fresh information of the day.
    
    Start browsing gossips by clicking in the home button or visit the url /home
    @else
        Welcome to INSA Potins, a place where you can find the last crispy gossip inside the school.
        To start the experience please register or if you already have an accound please log in.
    @endif
@endsection