@extends('layouts.app')

@section('title', 'INSA Potins Search')

@section('content')
    <h1>Search for: {{ $query }}</h1>
    @if($posts == '[]')
        <h4>No results found for {{$query}}</h4>
    @else
        @foreach ($posts as $post)
        @include('subviews.post', ['post' => $post])
        @endforeach
    @endif
@endsection
