@extends('layouts.appfullscreen')
    @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
@section('content')
<div class="jumbotron">
        <div class="container">
          <div class="row">
            <div class="col col-lg-8">
              <h1>{{ $user->pseudo }}'s profile</h1>
              @if(Auth::user() == $user)
              <h2>{{ $user->prenom }} {{ $user->nom }}</h2>
              <p><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> {{ $user->email }}</p>
              <p><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> {{ $user->credits }} crédits disponibles</p>
              <p><a class="btn btn-primary btn-lg" href="/user/edit/{{ $user->id }}" role="button">Edit my profile</a></p>
              @endif
            </div>
            <div class="col">
                <img src="/images/{{ $user->picture }}" width="300px"/>
            </div>
        </div>
    </div>
</div>

    <div class="container">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">My Posts</a>
            </li>
           <!--<li role="presentation"><a href="#accepted" aria-controls="profile" role="tab" data-toggle="tab">Accepted posts</a></li>
            <li role="presentation"><a href="#declined" aria-controls="messages" role="tab" data-toggle="tab">Declined Posts</a></li>-->
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                @foreach ($user->posts as $post)
                @include('subviews.post', ['post' => $post])
                @endforeach
            </div>
        </div>

    </div>

@endsection
