@extends('layouts.appfullscreen')

@section('content')
<div class="jumbotron">
        <div class="container">
            <h1>Profile settings</h1>
            <h2>Informations</h2>
            <form method="POST" action="{{ route('profile.edit', $user->id) }}">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon">@</div>
                <input type="text" class="form-control" name="pseudo" value="{{ $user->pseudo }}">
              </div>
              </div>
              <div class="form-group">
                <label for="prenom">Name</label>
                <input type="text" class="form-control" name="prenom" value="{{ $user->prenom }}">
              </div>
              <div class="form-group">
                <label for="nom">Lastname</label>
                <input type="text" class="form-control" name="nom"  value="{{ $user->nom }}">
              </div>
              <div class="form-group">
                <label for="nom">Email address <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></label>
                <input type="Email" class="form-control" name="email"  value="{{ $user->email }}">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>


            @if(Auth::user() == $user)
            <p><a class="btn btn-primary btn-lg" href="/editprofile" role="button">Change password</a>
              <a class="btn btn-danger btn-lg" href="/editprofile" role="button">Delete account</a>
              </p>
            @else
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Follow</a></p>
            @endif
        </div>
    </div>
@endsection
