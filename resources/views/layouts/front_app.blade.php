
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Publikasi</title>
<!-- Stylesheets -->
<link href="{{asset('front/css/vendor/simple-line-icons.css')}}" rel="stylesheet">
<link href="{{asset('front/css/vendor/icofont.min.css')}}" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
<link href="{{asset('front/css/vendor/metropolis.css')}}" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
<link href="{{asset('front/css/vendor/material-design-iconic.min.css')}}" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
<link href="{{asset('front/css/vendor/font-awesome.css')}}" rel="stylesheet">
<link href="{{asset('front/css/plugins/animate.min.css')}}" rel="stylesheet">
<link href="{{asset('front/css/plugins/swiper-bundle.min.css')}}" rel="stylesheet">

{{-- <link href="{{asset('front/css/style.css')}}" rel="stylesheet"> --}}

<link rel="stylesheet" href="{{asset('front/css/vendor/vendor.min.css')}}" />
<link rel="stylesheet" href="{{asset('front/css/plugins/plugins.min.css')}}" />
<link rel="stylesheet" href="{{asset('front/css/style.min.css')}}" />
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>

<body>


    @include('front.header')
    @yield('content')








    <footer class="footer-section">
        <div class="footer-top position-relative">

            {{-- <img class="footer-shape" src="assets/images/footer/1.png" alt="shape"> --}}
            <div class="container">
                <div class="" >
                    <div class="float-left " style="position:right">
                        <div class="footer-widget">
                           
                                Publikasi Ilmiah Politeknik Negeri Jakarta <br>
                                Jalan Prof.Dr.G.A.Siwwabessy,Kampus UI , Depok 16425<br>
                                Telp: (021) 7270034<br>
                                Laman: http:// www.pnj.ac.id
                        </div>
                    </div>
                 
                  
                </div>
            </div>
        </div>
        <!-- coppy right satrt -->
        <div class="copy-right-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright-info text-center">
                            <p>
                                Copyright &copy; <span id="currentYear"></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- coppy right end -->
    </footer>

    <script src="{{asset('front/js/vendor/vendor.min.js')}}"></script>
    <script src="{{asset('front/js/waypoints.min.js')}}"></script>
    <script src="{{asset('front/js/vendor/parallax.js')}}"></script>
    <script src="{{asset('front/js/plugins/plugins.min.js')}}"></script>
    <script src="{{asset('front/js/ajax-contact.js')}}"></script>
    <script src="{{asset('front/js/main.min.js')}}"></script>




</body>
</html>