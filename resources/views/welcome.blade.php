<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sapathanos - RH</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="hold-transition sidebar-mini">

<div id="app">
    <!-- Site wrapper -->
    <vue-snotify></vue-snotify>
    <preloader-component></preloader-component>
    <router-view></router-view>
</div>
<!-- ./wrapper -->

<script src="{{ mix('/js/app.js')  }}"></script>
</body>
</html>
