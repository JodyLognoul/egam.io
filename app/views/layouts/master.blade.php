<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestgame - Mobile First</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    {{ HTML::style("css/vendor/bootstrap/bootstrap.min.css") }}
    {{ HTML::style("css/main.css") }}
</head>
<body>
    <!-- TODO - browsehappy.com -->

    <!-- content -->
    <div class="container">
        <nav id="navbar" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL::to('/')}}">Guestgame</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav nav-pills">
                        <li class="active"><a href="#">Home</a></li>
                        <li class=""><a href="#">Notifications <span class="badge">42</span></a></li>
                    </ul>
                    @if( Auth::check() )
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }} <span class="glyphicon glyphicon-user"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li>{{ link_to_route('user.logout', 'Logout') }}</li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                    @else
                    {{ Form::open(array('route' => 'user.login','class' => 'navbar-form navbar-right') ) }}
                    <div class="form-group">
                        {{ Form::email('email', Input::old('email'), array('class' => 'form-control','placeholder' => 'Email','autofocus' => "")) }}    
                    </div>
                    <div class="form-group">
                        {{ Form::password('password', array('class' => 'form-control','placeholder' => 'Password')) }}
                    </div>
                    {{ Form::submit('Login', array('class' => 'btn btn-primary' )) }}
                    {{ link_to_route('user.register', 'Register', array(), array('class' => 'btn btn-success')) }}
                    {{ Form::close() }}
                    @endif

                </div>
            </div>
        </nav>
        @if( Session::has('message') )
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('message') }}
        </div>
        @endif

        @if( Session::has('error') )
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('error') }}
        </div>
        @endif
        @yield('content')
    </div>
    <!-- END content -->

    {{ HTML::script("js/vendor/jquery/jquery.min.js") }}
    {{ HTML::script("js/vendor/bootstrap/bootstrap.min.js") }}

    <!-- TODO - Google Analytics -->
</body>
</html>