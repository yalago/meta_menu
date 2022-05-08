<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <link href="{{ asset('assets/lib/bootstrap/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.rtl.css') }}" rel="stylesheet">
    @yield('styles')


</head>

<body>
    <div id="main-wrap" @yield('background')>
        @include('frontend.layouts.sections.header_home')
        <div id="content-wrap" class="position-fixed mh-50 w-100 text-light p-3 pt-0">
            @yield('content')
        </div>
        @yield('footer')
    </div>
</body>
<script src="{{ asset('assets/lib/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/lib/jquery/jquery-3.6.0.min.js') }}"></script>
@yield('scripts')
<script src="{{ asset('assets/js/scripts.js') }}"></script>
@yield('csutom_scripts')
</html>
