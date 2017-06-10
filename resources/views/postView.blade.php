@extends('layouts.app')

@section('content')
    @include('subviews.post', ['post' => $post])


    <form id="comment" method="POST" action="{{ route('post.comment', $post->id) }}">
            {{ csrf_field() }}
            <label for="msg-text">Comments</label>
            <textarea class="form-control" id="msg-text" name="message" rows="3"></textarea>
            <button type="submit" class="btn btn-primary">Comment</button>
        </form>

    @foreach ($comments as $comment)
    <div class="media">
        <div class="media-left">
            <a href="#">
                <img alt="64x64" class="media-object" data-src="holder.js/64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNWM4ODM1MGMxZCB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1Yzg4MzUwYzFkIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMy40Njg3NSIgeT0iMzYuNSI+NjR4NjQ8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">{{ $comment->user->pseudo }}</h4>
            {{ $comment->content }}
            <span>{{ Carbon\Carbon::parse($post->created_at)->toDayDateTimeString() }}</span>
        </div>
    </div>
    @endforeach

@endsection
