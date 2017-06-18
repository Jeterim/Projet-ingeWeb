@extends('layouts.app')

@section('content')
@if (Auth::check())
    <h4>Etes vous sur de vouloir supprimer ce potins  ? </h4>
    <a  href="{{ route('home')}}"><button type="button" class="btn btn-default">Cancel</button></a>
    <a  href="/delete/{{$post->id}}"><button type="button" class="btn btn-danger">Yes</button></a>
    @include('subviews.post', ['post' => $post])
@endif
@endsection