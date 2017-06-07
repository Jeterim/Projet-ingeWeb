@extends('layouts.app')

@section('content')
    @foreach ($posts as $post)
    @include('subviews.post', ['post' => $post])
    @endforeach
@endsection
