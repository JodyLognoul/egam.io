<!DOCTYPE html>
<html class="no-js html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ Lang::get('general.title') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico?v=3') }}">
    @yield('styles')

    {{ HTML::style("js/vendor/bootstrap/dist/css/bootstrap.min.css") }}    
    {{ HTML::style("js/vendor/Bootflat/bootflat/css/bootflat.css") }}
    {{ HTML::style("css/vendor/datetimepicker/jquery.datetimepicker.css") }}
    {{ HTML::style("css/main.css") }}
</head>
<body class="body">

    <!-- TODO - browsehappy.com -->
    
    <!-- Content -->
    <div class="container">
        <nav id="navbar" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ URL::route('homepage')}}">e<span class="dark-green">G</span>amio</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav nav-pills">
                        @if(Auth::check()) 
                            <li class=""><a href="{{ URL::route('event.create') }}"><span class="dark-green">O</span>rganise</a></li>
                            <li class=""><a href="{{ URL::route('event.index') }}"><span class="dark-green">E</span>vents</a></li>
                            <li class=""><a href="{{ URL::route('user.profile') }}"><span class="dark-green">D</span>ashboard</a></li>
                            <li class=""><a href="{{ URL::route('notification.index') }}"><span class="dark-green">N</span>otifications <span class="badge badge-warning">{{ Auth::user()->unreadNotificationsQty() }}</span></a></li>
                        @endif 
                    </ul>
                    @if( Auth::check() )
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><img src="{{! Auth::user()->image }}" alt="..." class="img-profile img-rounded"></li>
                        <li class="dropdown nav-profile-username">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }} <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>{{ link_to_route('user.profile', 'Profile') }}</li>
                                <li class="divider"></li>
                                <li>{{ link_to_route('user.logout', 'Logout') }}</li>
                            </ul>
                        </li>
                    </ul>
                    @endif
                </div>
                <!--/.navbar-collapse -->
            </div>
        </nav>
        <!-- Messages -->
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

        <!-- Modals -->
        @if( Session::has('alert-modal') )

        <div class="modal fade" id="alert-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-center" id="myModalLabel">Alert</h4>
                    </div>
                    <div class="modal-body">
                        {{ Session::get('alert-modal') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        @endif

        @yield('content')

    </div>
    <!-- END Content -->
    <!-- Footer -->
    <div class="footer footer-custom">
      <div class="container">
        <div class="clearfix">
          <div class="footer-logo">
            <a class="navbar-brand" href="{{ URL::to('/')}}"><i class="glyphicon glyphicon-tower"></i> eGamio</a>
        </div>
        <dl class="footer-nav">
            <dt class="nav-title">PORTFOLIO</dt>
            <dd class="nav-item"><a href="#">Web Design</a></dd>
            <dd class="nav-item"><a href="#">Branding &amp; Identity</a></dd>
            <dd class="nav-item"><a href="#">Mobile Design</a></dd>
            <dd class="nav-item"><a href="#">Print</a></dd>
            <dd class="nav-item"><a href="#">User Interface</a></dd>
        </dl>
        <dl class="footer-nav">
            <dt class="nav-title">ABOUT</dt>
            <dd class="nav-item"><a href="#">The Company</a></dd>
            <dd class="nav-item"><a href="#">History</a></dd>
            <dd class="nav-item"><a href="#">Vision</a></dd>
        </dl>
        <dl class="footer-nav">
            <dt class="nav-title">GALLERY</dt>
            <dd class="nav-item"><a href="#">Flickr</a></dd>
            <dd class="nav-item"><a href="#">Picasa</a></dd>
            <dd class="nav-item"><a href="#">iStockPhoto</a></dd>
            <dd class="nav-item"><a href="#">PhotoDune</a></dd>
        </dl>
        <dl class="footer-nav">
            <dt class="nav-title">CONTACT</dt>
            <dd class="nav-item"><a href="#">Basic Info</a></dd>
            <dd class="nav-item"><a href="#">Map</a></dd>
            <dd class="nav-item"><a href="#">Conctact Form</a></dd>
        </dl>
    </div>
    <div class="footer-copyright text-center">Copyright © 2014 Flathemes.All rights reserved.</div>
</div>
</div>
<!-- END Footer -->
<!-- TODO - Google Analytics -->
<!-- Scripts -->
{{ HTML::script("js/vendor/jquery/dist/jquery.min.js") }}
{{ HTML::script("js/vendor/bootstrap/dist/js/bootstrap.min.js") }}
{{ HTML::script("js/vendor/datetimepicker/jquery.datetimepicker.js") }}
{{! HTML::script("js/NewPicturePreview.js") }}
<script>
$('.gg-tooltip').tooltip();
$('.datetimepicker').datetimepicker({
    format:'D d M Y H:i',
    step: '15',
    lang: 'fr',
    minDate: 0
});
$('.datepicker').datetimepicker({
    format:'d m y',
    lang: 'fr',
    timepicker: false,
    closeOnDateSelect: true,
    onSelectDate: function(current_date, $input){
        document.dispatchEvent(new CustomEvent('datetimepickerEvents', {"detail" : current_date.dateFormat('Y-m-d')} ));
    }
});
</script>
@yield('scripts')

</body>
</html>