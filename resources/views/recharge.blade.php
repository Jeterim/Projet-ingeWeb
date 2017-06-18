@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="panel">
            <h2 class="panel-heading"> Rechargement de 50 crédits</h2>
            <div class='card-wrapper'></div>
            <form id="card-form" class="panel-body" method="POST" action="/moreCredits">
            {{ csrf_field() }}
                <input type="text" name="number" placeholder="5131 4040 4040 4040">
                <input type="text" name="name" placeholder="Your Name"/>
                <input type="text" name="expiry" placeholder="mm/yyyy"/>
                <input type="text" name="cvc" placeholder="123"/>
                <button type="submit" class="btn btn-success">
                <span class="glyphicon glyphicon-check" aria-hidden="true"></span> Submit</button>
            </form>
        </div>
    @endif
@endsection