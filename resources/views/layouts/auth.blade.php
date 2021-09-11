<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="LEGOCODE, LDA">
    <meta name="description" content="SAÚDE, à SUA PORTA">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Meddelivery') }}</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontello.css')}}">
    <link href="{{asset('assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet">
    <link href="{{asset('assets/fonts/icon-7-stroke/css/helper.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/icheck.min_all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/price-range.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">

    <!-- <link rel="stylesheet" href="{{asset('assets/css/modal.css')}}"> -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/wizard.css')}}">

</head>

<body class="hold-transition skin-green sidebar-mini">
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <div id="content">
        <main class="py-4" id="app">
            <div class="container">
                <div class="col-lg-12">
                    @include('layouts.alerts')
                </div>
            </div>

            @yield('content')
            <div class="js-cookie-consent cookie-consent">
                @include('cookieConsent::index')
            </div>
        </main>
    </div>
    @include('layouts.floatbutton')
    <script>
        function routeToCart() {
            event.preventDefault();
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "/carrinho",
                type: 'get',
                data: {
                    CSRF_TOKEN
                },
                success: function(data) {
                    $("#").html(data)
                }
            })
        }
    </script>
    <script>
        $('#wsupp').circleType({
            radius: 135
        });
    </script>
    <script>
        var preloader;

        function preload(opacity) {
            if (opacity <= 0) {
                showContent();
            } else {
                preloader.style.opacity = opacity;
                window.setTimeout(function() {
                    preload(opacity - 0.05)
                }, 100);
            }
        }

        function showContent() {
            preloader.style.display = 'none';
            document.getElementById('content').style.display = 'block';
        }
        document.addEventListener("DOMContentLoaded", function() {
            preloader = document.getElementById('preloader');
            preload(1);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.trigger').click(function() {
                $('.modal-wrapper').toggleClass('open');
                $('.page-wrapper').toggleClass('blur');
                return false;
            });
        });
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->

    <script src="{{asset('assets/js/modernizr-2.6.2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-hover-dropdown.js')}}"></script>
    <script src="{{asset('assets/js/easypiechart.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.easypiechart.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.js')}}"></script>
    <script src="{{asset('assets/js/icheck.min.js')}}"></script>
    <script src="{{asset('assets/js/price-range.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/wizard.js')}}"></script>

</body>

</html>