@extends('layouts.app')

@section('title', 'INSA Potins')

@section('content')
    @foreach ($posts as $post)
    @include('subviews.post', ['post' => $post])
    @endforeach
@endsection
