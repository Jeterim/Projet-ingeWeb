@extends('layouts.appfullscreen')
    
@section('content')
    
@if(Auth::user() == $user)
<div class="jumbotron">
        <div class="container">
            @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            <h1>Profile settings</h1>
            <h2>Informations</h2>
            <form method="POST" enctype="multipart/form-data" action="{{ route('profile.edit', $user->id) }}">
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
              <div class="form-group">
                <label class="control-label">Picture profile</label>
                <input id="picture" type="file" name="picture" class="file">
              </div>
              <button type="submit" class="btn btn-primary">Save changes</button>
              <a class="btn btn-primary" data-toggle="modal" data-target="#modalPassword" role="button">Change password</a>
              <a class="btn btn-danger" href="/user/delete/{{ $user->id }}" onclick="confirm('Do you really want to delete your acount?');" id="deleteaccount" role="button">Delete account</a>

            </form>
            @else
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Follow</a></p>
            @endif
        </div>
    </div>

    @if (Auth::check())
        <!-- Modal -->
        <div class="modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('profile.editpassword', $user->id) }}">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Change your password</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="old-password" class="control-label">Old password</label>
                            <input type="password" class="form-control" id="oldpassword" name="oldpassword" required/>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="form-group">
                            <label for="password" class="control-label">Confirm password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Save change</button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    @endif

@endsection
