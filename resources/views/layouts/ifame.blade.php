<!DOCTYPE html>
<html ng-app="iFrame">
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
    {{--<link href="/{{ config('app.source') }}/css/main.css" rel="stylesheet">--}}
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


    <script src="/{{ config('app.source') }}/js/main.js"></script>
    <script src="/{{ config('app.source') }}/js/ajax.js"></script>
    <script src="/{{ config('app.source') }}/js/customize/notifications.js"></script>

    <script>

        var _app = angular.module('iFrame', []);
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
<div class="container" >
    @yield('content')
</div>
@yield('script')
</body>
</html>
