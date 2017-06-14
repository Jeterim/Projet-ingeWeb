@extends('layouts.app')

@section('title', 'INSA Potins')

@if(Auth::check())
@else
    @section('sidebar')
    @endsection
@endif

@section('content')

    @if(Auth::check())
    Dashboard
    @else
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, molestiae, nam. Cumque sapiente, voluptatibus illo distinctio, quo eligendi nostrum sint libero ratione veritatis debitis, officia recusandae nulla quisquam enim nam!
        Inscrit toi !
    @endif
@endsection