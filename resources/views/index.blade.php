@extends('layouts.app')

@section('title', 'INSA Potins')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img src="https://pbs.twimg.com/profile_images/641572075321229312/3f_9iwzr_normal.jpg" alt="">
                        <h4><a href="#">John Doe</a> <span>@john_doe</span></h4> <span>5:34 23 Apr 2016</span></div>
                    <div class="panel-body">
                        <blockquote>
                            This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.
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
                                    <li><a href="#">Comment</a></li>
                                    <li><a href="#">Share</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Report</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img src="https://pbs.twimg.com/profile_images/641572075321229312/3f_9iwzr_normal.jpg" alt="">
                        <h4>John Doe <span>@john_doe</span></h4> <span>5:34 23 Apr 2016</span></div>
                    <div class="panel-body">
                        <blockquote>
                            This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.
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
                                <a class="action-link other-btn" href="#">
                                    <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <nav>
                    <ul class="pager">
                        <li><a href="#">Load more ...</a></li>
                    </ul>
                </nav>
@endsection