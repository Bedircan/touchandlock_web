<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta https-equiv="x-ua-compatible" content="ie=edge">
    <title>Touch & Lock, An Airbnb-Like App</title>
    <meta name="description" content="Touch & Lock">
    <!-- JQuery -->
    <script src="{{secure_asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
    <link rel="application/font-sfnt"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/fonts/fontawesome-webfont.ttf">
    <link rel="stylesheet" id="compiled.css-css" href="{{secure_asset('css/compiled.min.css')}}" type="text/css">

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ secure_asset('js/bootstrap.min.js')}}"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">



    <link rel="stylesheet" href="{{ secure_asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/prism.min.css') }}">
    <!-- Material Design Bootstrap -->
    <link href="{{ secure_asset('css/mdb.min.css')}}" rel="stylesheet">

    <!-- Your custom styles (optional) -->
    <link href="{{ secure_asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ secure_asset('css/custom.css')}}" rel="stylesheet">

    <!--Dropzone--->
    <script src="{{secure_asset('js/dropzone.js')}}"></script>
    <link href="{{ secure_asset('css/dropzone.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{secure_asset('assets/bootstrap-daterangepicker/date.js')}}"></script>

    <script type="text/javascript" src="{{secure_asset('assets/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <link href="{{secure_asset('assets/bootstrap-datepicker/css/datepicker.css')}}"rel="stylesheet">






</head>
<body style="zoom: 90%" background="https://www.toptal.com/designers/subtlepatterns/patterns/white_wall_hash.png">
@include('layouts.partials.navbar')
<div class="container">
    @yield('content')
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer class="footer">
    <div class="container text-center">
        <p class="pull-left">© 2017 Ctis, Team8, Senior Project Inc. All Rights Reserved</p>
        <ul class="pull-right list-inline">
            <li>
                <a href="https://www.team-8.tk">Touch&Lock</a>
            </li>
            <li>
                <a href="https://www.team-8.tk/contact">Contact</a>
            </li>
        </ul>
    </div>
</footer>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ secure_asset('js/tether.min.js')}}"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ secure_asset('js/mdb.min.js')}}"></script>

<script type="text/javascript" src="{{ secure_asset('js/app.js')}}"></script>
<script>
    $(function () {
        $('[data-toggle="dropdown"]').dropdown();
    });
</script>


</body>
</html>
