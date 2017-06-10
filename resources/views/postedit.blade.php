@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <img src="https://pbs.twimg.com/profile_images/641572075321229312/3f_9iwzr_normal.jpg" alt="">
        <h4><a href="/user/{{ $post->user_id }}">@if(!$post->pseudo) {{$post->user->pseudo}} @else {{ $post->pseudo }} @endif</a></h4> <span>{{ Carbon\Carbon::parse($post->updated_at)->toDayDateTimeString() }}</span>
    </div>
    <div class="panel-body">
        <form method="POST" action="{{ route('post.edit', $post->id) }}">
            {{ csrf_field() }}
            <textarea name="message"<textarea class="form-control" id="msg-text" name="message" rows="3">{{ $post->content }}</textarea>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
    
</div>



@endsection
