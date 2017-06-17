<!DOCTYPE html>
<html ang="{{ config('app.locale') }}">

<head>
    <title>{{ config('app.name', 'INSA Potins') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    @include('subviews.topbar')

    <div class="container">
        @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
        <div class="row">
            <div class="col-sm-8 blog-main">
                @yield('content')
            </div>
            <!-- /.blog-main -->

            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                @section('sidebar')
                    <div class="sidebar-module sidebar-module-inset">
                        <h4>About</h4>
                        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                    </div>
                    <div class="sidebar-module">
                        <h4>Archives</h4>
                        <ol class="list-unstyled">
                            <li><a href="/timeline/2017-06">June 2017</a></li>
                            <li><a href="/timeline/2017-05">May 2017</a></li>
                            <li><a href="/timeline/2017-04">April 2017</a></li>
                            <li><a href="/timeline/2017-03">March 2017</a></li>
                            <li><a href="/timeline/2017-02">February 2017</a></li>
                            <li><a href="/timeline/2017-01">January 2017</a></li>
                            <li><a href="/timeline/2016-12">December 2016</a></li>
                        </ol>
                    </div>
                @show
                </div>
            </div>
            <!-- /.blog-sidebar -->

        </div>
        <!-- /.row -->

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @if(Auth::check())
        <script>
            var userId = {{Auth::user()->id}};
        </script>
    @endif
    <script src="{{ mix('js/app.js') }}"></script>

</body>

</html>