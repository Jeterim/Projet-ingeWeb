@extends('layouts.appfullscreen')

@section('content')
<!--<div class="jumbotron">
        <div class="container">
          <div class="row">
            <div class="col">
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


            @if(Auth::user() == $user)
            <p><a class="btn btn-primary btn-lg" href="/editprofile" role="button">Change password</a>
              <a class="btn btn-primary btn-lg" href="/editprofile" role="button">Save changes</a></p>
            @else
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Follow</a></p>
            @endif
          </div>
          <div class="col">
            <img src="https://static.rentacar.fr/images/cms_uploaded/pages/hub-vehicule/vp/location-voiture-rentacar-citadine.png" width=900px"/>
          </div>
          </div>
        </div>
    </div>
-->
</div>
@endsection
