@extends('layouts.appfullscreen')

@section('content')
<div class="jumbotron">
        <div class="container">
            <h1>Profile settings</h1>
            <h2>Informations</h2>
            <form>
              <div class="form-group">
                <label for="nom">Pseudo</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon">@</div>
                <input type="text" class="form-control" id="inlineFormInputGroup" value="{{ $user->pseudo }}">
              </div>
              </div>
              <div class="form-group">
                <label for="nom">Name</label>
                <input type="text" class="form-control" id="prenom"  value="{{ $user->prenom }}">
              </div>
              <div class="form-group">
                <label for="nom">Lastname</label>
                <input type="text" class="form-control" id="nom"  value="{{ $user->nom }}">
              </div>
              <div class="form-group">
                <label for="nom">Email address <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></label>
                <input type="Email" class="form-control" id="email"  value="{{ $user->email }}">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
            </form>

            <p>Profil crée le {{ $user->updated_at }}</p>
            <p><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> {{ $user->credits }} crédits disponibles</p>


            @if(Auth::user() == $user)
            <p><a class="btn btn-primary btn-lg" href="/editprofile" role="button">Save changes</a></p>
            @else
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Follow</a></p>
            @endif
        </div>
    </div>
@endsection
