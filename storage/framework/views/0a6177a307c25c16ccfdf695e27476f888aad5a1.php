<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php if( isset($title)  ) { echo $title; } else { echo  config('app.name', 'Partout'); } ?></title>

    <!-- Styles -->
    <link href="/<?php echo e(config('app.source')); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/<?php echo e(config('app.source')); ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/<?php echo e(config('app.source')); ?>/css/pace.css" rel="stylesheet">
    <link href="/<?php echo e(config('app.source')); ?>/css/jquery-toast.css" rel="stylesheet">
    <link href="/<?php echo e(config('app.source')); ?>/css/jquery-confirm.css" rel="stylesheet">
    <link href="/<?php echo e(config('app.source')); ?>/css/main.css" rel="stylesheet">
    <link href="/<?php echo e(config('app.source')); ?>/css/customize/custom.css" rel="stylesheet">
    <link href="/<?php echo e(config('app.source')); ?>/css/bootstrap-datepicker3.css" rel="stylesheet">
    <link href="/<?php echo e(config('app.source')); ?>/fullcalendar/fullcalendar.min.css" rel="stylesheet">

    <!-- Scripts -->

    <script src="/<?php echo e(config('app.source')); ?>/js/jquery-3.1.1.min.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/js/jquery-ui.min.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/js/angular.min.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/js/pace.min.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/js/jquery-toast.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/js/jquery.validate.min.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/js/jquery-confirm.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/js/angular-dragdrop.min.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/fullcalendar/lib/moment.min.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/fullcalendar/fullcalendar.min.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/js/angular-validate.min.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/js/angular-sanitize.js"></script>



    <script src="/<?php echo e(config('app.source')); ?>/js/main.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/js/ajax.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/js/customize/notifications.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/js/socket.io.js"></script>
    <script src="/<?php echo e(config('app.source')); ?>/js/bootstrap-datepicker.min.js"></script>

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
    <?php echo $__env->yieldContent('style'); ?>

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
            <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
                <img src="/src/image/logo.png" alt="">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <?php if( !Auth::guest()): ?>
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
            <?php endif; ?>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                    <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
                <?php else: ?>

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
                            <img src="/<?php echo e(config('app.source')); ?>/image/flag-<?php echo e(Lang::getLocale()); ?>.png" alt=""/>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <div class="sprect">&nbsp;</div>
                            <?php if( Lang::getLocale() == 'en'): ?>
                                <li><a href="/lang/jp?ret=<?php echo e($_SERVER['REQUEST_URI']); ?>"><img src="/<?php echo e(config('app.source')); ?>/image/flag-jp.png" alt=""/> 日本語</a></li>
                                <li><a href="/lang/vi?ret=<?php echo e($_SERVER['REQUEST_URI']); ?>"><img src="/<?php echo e(config('app.source')); ?>/image/flag-vi.png" alt=""/> Tiếng Việt</a></li>
                            <?php endif; ?>
                            <?php if( Lang::getLocale() == 'jp'): ?>
                                <li><a href="/lang/en?ret=<?php echo e($_SERVER['REQUEST_URI']); ?>"><img src="/<?php echo e(config('app.source')); ?>/image/flag-en.png" alt=""/> English</a></li>
                                <li><a href="/lang/vi?ret=<?php echo e($_SERVER['REQUEST_URI']); ?>"><img src="/<?php echo e(config('app.source')); ?>/image/flag-vi.png" alt=""/> Tiếng Việt</a></li>
                            <?php endif; ?>
                            <?php if( Lang::getLocale() == 'vi'): ?>
                                <li><a href="/lang/en?ret=<?php echo e($_SERVER['REQUEST_URI']); ?>"><img src="/<?php echo e(config('app.source')); ?>/image/flag-en.png" alt=""/> English</a></li>
                                <li><a href="/lang/jp?ret=<?php echo e($_SERVER['REQUEST_URI']); ?>"><img src="/<?php echo e(config('app.source')); ?>/image/flag-jp.png" alt=""/> 日本語</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="dropdown">

                        <a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i style="padding-right: 0px" class="fa fa-user-circle" aria-hidden="true"></i>

                            <?php echo e(Auth::user()->name); ?>

                            <span class="caret"></span>

                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <div class="sprect">&nbsp;</div>
                            <li>
                                <a href="<?php echo e(url('/logout')); ?>"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        </ul>
                    </li>


                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container" >
    <?php if( ! Auth::guest()): ?>
    <input type="hidden" name="user_login_id" value="<?php echo e(Auth::user()->id); ?>">
    <?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>
</div>
<nav class="navbar dropup bottom navbar-fixed-bottom">
    <div class="container">
        <div class="collapse navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav navbar-left">
                <li >
                    <a href="">登録</a>
                    <ul class="ul-setting">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle a-flag" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cogs" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <div class="sprect-bottom">&nbsp;</div>
                                <li><a href="#" id='setting-busyo'>部署マスター</a></li>
                                <li><a href="#">職業登録</a></li>
                                <li><a href="#" id='personal-registration'>個人情報登録</a></li>

                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
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
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
