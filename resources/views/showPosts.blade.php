
    @foreach ($posts as $post)
    @include('subviews.post', ['post' => $post])
    @endforeach

