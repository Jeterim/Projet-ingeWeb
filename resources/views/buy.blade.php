@extends('layouts.app')

@section('content')
@if (Auth::check())
            {{-- <form method="POST" action="/buy/{{$post->id}}">
                <!-- Modal content-->
                <input type="hidden"  id="post_id" value="{{$post->id }}">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Buy {{$post->pseudo}}</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to buy the potin for </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
                </div>
            </form> --}}
    <h4>Etes vous sur de vouloir supprimer ce potins  ? </h4>
    <a  href="{{ route('home')}}"><button type="button" class="btn btn-default">Cancel</button></a>
    <a  href="/delete/{{$post->id}}"><button type="button" class="btn btn-danger">Yes</button></a>
    @include('subviews.post', ['post' => $post])
@endif
@endsection