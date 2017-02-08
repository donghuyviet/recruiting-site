<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title><?php if( isset($title)  ) { echo $title; } else { echo  config('app.name', 'Partout'); } ?></title>

    <!-- Styles -->
    <link href="/{{ config('app.source') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/{{ config('app.source') }}/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/{{ config('app.source') }}/css/pace.css" rel="stylesheet">
    <link href="/{{ config('app.source') }}/css/jquery-toast.css" rel="stylesheet">
    <link href="/{{ config('app.source') }}/css/jquery-confirm.css" rel="stylesheet">
    <link href="/{{ config('app.source') }}/css/main.css" rel="stylesheet">
    <link href="/{{ config('app.source') }}/css/customize/custom.css" rel="stylesheet">
    <link href="/{{ config('app.source') }}/css/bootstrap-datepicker3.css" rel="stylesheet">
    <link href="/{{ config('app.source') }}/fullcalendar/fullcalendar.min.css" rel="stylesheet">

    <!-- Scripts -->

    <script src="/{{ config('app.source') }}/js/jquery-3.1.1.min.js"></script>
    <script src="/{{ config('app.source') }}/js/jquery-ui.min.js"></script>
    <script src="/{{ config('app.source') }}/js/angular.min.js"></script>
    <script src="/{{ config('app.source') }}/bootstrap/js/bootstrap.min.js"></script>
    <script src="/{{ config('app.source') }}/js/pace.min.js"></script>
    <script src="/{{ config('app.source') }}/js/jquery-toast.js"></script>
    <script src="/{{ config('app.source') }}/js/jquery.validate.min.js"></script>
    <script src="/{{ config('app.source') }}/js/jquery-confirm.js"></script>
    <script src="/{{ config('app.source') }}/js/angular-dragdrop.min.js"></script>
    <script src="/{{ config('app.source') }}/fullcalendar/lib/moment.min.js"></script>
    <script src="/{{ config('app.source') }}/fullcalendar/fullcalendar.min.js"></script>
    <script src="/{{ config('app.source') }}/js/angular-validate.min.js"></script>
    <script src="/{{ config('app.source') }}/js/angular-sanitize.js"></script>



    <script src="/{{ config('app.source') }}/js/main.js"></script>
    <script src="/{{ config('app.source') }}/js/ajax.js"></script>
    <script src="/{{ config('app.source') }}/js/customize/notifications.js"></script>
    <script src="/{{ config('app.source') }}/js/socket.io.js"></script>
    <script src="/{{ config('app.source') }}/js/bootstrap-datepicker.min.js"></script>

    <script>

        var _app = angular.module('myApp', ['ngDragDrop','ngValidate','ngSanitize']);
        _app.config(function($interpolateProvider) {
            $interpolateProvider.startSymbol('//');
            $interpolateProvider.endSymbol('//');
        })

        window.Laravel = '<?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>';

        var base_url = '<?php echo url('/'); ?>';
    </script>
    @yield('style')

</head>
<body >
<nav class="navbar navbar-default navbar-static top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/home') }}">
                <img src="/src/image/logo.png" alt="">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            @if ( !Auth::guest())
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav navbar-left">
                <li >
                    <a href="">マイページ</a>

                    <ul class="ul-setting">
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle a-flag" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <div class="sprect">&nbsp;</div>
                                <li><a href="#">設定</a></li>
                                <li><a href="#">削除</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else

                    <li class="has-noti">
                        <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                        <div class="show-noti show">3</div>
                    </li>
                    <li class="has-noti">
                        <a href=""><i class="fa fa-bell-o" aria-hidden="true"></i></a>
                        <div class="show-noti show">9</div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle a-flag" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="/{{ config('app.source') }}/image/flag-{{ Lang::getLocale() }}.png" alt=""/>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <div class="sprect">&nbsp;</div>
                            @if( Lang::getLocale() == 'en')
                                <li><a href="/lang/jp?ret={{$_SERVER['REQUEST_URI']}}"><img src="/{{ config('app.source') }}/image/flag-jp.png" alt=""/> 日本語</a></li>
                                <li><a href="/lang/vi?ret={{$_SERVER['REQUEST_URI']}}"><img src="/{{ config('app.source') }}/image/flag-vi.png" alt=""/> Tiếng Việt</a></li>
                            @endif
                            @if( Lang::getLocale() == 'jp')
                                <li><a href="/lang/en?ret={{$_SERVER['REQUEST_URI']}}"><img src="/{{ config('app.source') }}/image/flag-en.png" alt=""/> English</a></li>
                                <li><a href="/lang/vi?ret={{$_SERVER['REQUEST_URI']}}"><img src="/{{ config('app.source') }}/image/flag-vi.png" alt=""/> Tiếng Việt</a></li>
                            @endif
                            @if( Lang::getLocale() == 'vi')
                                <li><a href="/lang/en?ret={{$_SERVER['REQUEST_URI']}}"><img src="/{{ config('app.source') }}/image/flag-en.png" alt=""/> English</a></li>
                                <li><a href="/lang/jp?ret={{$_SERVER['REQUEST_URI']}}"><img src="/{{ config('app.source') }}/image/flag-jp.png" alt=""/> 日本語</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="dropdown">

                        <a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i style="padding-right: 0px" class="fa fa-user-circle" aria-hidden="true"></i>

                            {{ Auth::user()->name }}
                            <span class="caret"></span>

                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <div class="sprect">&nbsp;</div>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>


                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="container" >
    @if( ! Auth::guest())
    <input type="hidden" name="user_login_id" value="{{ Auth::user()->id }}">
    @endif
    @yield('content')
</div>

<div class="space-fullwidth-50"></div>
<div class="modal fade large-modal" id="home_setting" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
@yield('script')
</body>
</html>
