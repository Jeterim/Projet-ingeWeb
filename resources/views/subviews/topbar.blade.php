<nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">{{ config('app.name', 'INSA <span>Potins</span>') }}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home <span class="sr-only">(current)</span></a></li>
                    @if (Auth::check())
                    <li><a href="/user/{{ Auth::id() }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ Auth::user()->pseudo}}</a></li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                    <li class="dropdown" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-bell" aria-hidden="true"></span> 
                            Notifications 
                            <span id="notification-badge" class="badge">{{ Auth::user()->notifications()->count() }}</span>
                            @if ( Auth::user()->notifications()->count() > 0 )
                                <span class="caret"></span>
                                <ul id="notification-dropdown" class="dropdown-menu">
                                @foreach (Auth::user()->notifications as $notification)
                                @include('subviews.notification', ['notification' => $notification])
                                @endforeach    
                            </ul>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
                             Credits
                            <span id="credits" class="badge">{{ Auth::user()->credits }}</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            Settings
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/user/{{ Auth::id() }}">Your profile</a></li>
                            <li><a href="#">Profile settings</a></li>
                            <li><a href="#">Statistics</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
                        </ul>
                    </li>
                    <li><button type="button" class="btn btn-danger navbar-btn" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Post</button></li>

                    @else
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    @endif

                </ul>
                @if (Auth::check())
                <form class="navbar-form navbar-right" method="post" action="{{ route('search')}}">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <input type="text" class="form-control" name="search-text" pattern=".{3,}" required placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                @endif
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
@if (Auth::check())
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('post.create') }}">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Post something</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="message-text" class="control-label">Your post:</label>
                        <textarea class="form-control" id="message-text" name="message"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Post it</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endif
