<div class="panel panel-default">
    <div class="panel-heading">
        <img src="https://pbs.twimg.com/profile_images/641572075321229312/3f_9iwzr_normal.jpg" alt="">
        <h4><a href="/user/{{ $post->user_id }}">@if(!$post->pseudo) {{$post->user->pseudo}} @else {{ $post->pseudo }} @endif</a></h4> <span>{{ $post->updated_at }}</span></div>
    <div class="panel-body">
        <blockquote>
            {{ $post->content }}
        </blockquote>
    </div>
    <div class="panel-footer">
        <ul aria-label="Post actions">
            <li class="Post-action">
                <a class="action-link accept-btn" href="#">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <span id="accept-number" aria-hidden="true">42</span>
                </a>
            </li>
            <li class="Post-action">
                <a class="action-link decline-btn" href="#">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    <span id="decline-number" aria-hidden="true">59</span>
                </a>
            </li>
            <li class="Post-action">
                <a id="dLabel" data-target="#" class="action-link other-btn" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dLabel">
                    @if(Auth::id() == $post->user_id)
                    <li><a href="/potin/edit/{{ $post->id }}">Edit</a></li>
                    <li><a href="/potin/delete/{{ $post->id }}">Delete</a></li>
                    <li role="separator" class="divider"></li>
                    @endif
                    <li><a href="/post/{{ $post->id }}#comment">Comment</a></li>
                    <li><a href="#">Share</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Report</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>