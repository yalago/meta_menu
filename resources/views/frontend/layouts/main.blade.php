<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <link href="assets/lib/bootstrap/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="assets/css/styles.rtl.css" rel="stylesheet">
    @yield('styles')

    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/lib/jquery/jquery-3.6.0.min.js"></script>
    @yield('scripts')
    <script src="assets/js/scripts.js"></script>
</head>

<body>
    <div id="main-wrap" @yield('background')>
        @yield('header')
        @yield('content')
        @yield('footer')
    </div>
</body>


</html>