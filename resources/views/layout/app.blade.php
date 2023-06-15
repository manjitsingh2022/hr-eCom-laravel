<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <base href="public/">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>The Beverly Hills Luxury Boutique</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="your-csrf-token-value">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="manifest" href="site.webmanifest"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/home/assets/img/favicon.ico') }}">

<!-- CSS here -->
<link rel="stylesheet" href="{{ asset('public/home/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/home/assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/home/assets/css/slicknav.css') }}">
<link rel="stylesheet" href="{{ asset('public/home/assets/css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('public/home/assets/css/progressbar_barfiller.css') }}">
<link rel="stylesheet" href="{{ asset('public/home/assets/css/gijgo.css') }}">
<link rel="stylesheet" href="{{ asset('public/home/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/home/assets/css/animated-headline.css') }}">
<link rel="stylesheet" href="{{ asset('public/home/assets/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('public/home/assets/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/home/assets/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('public/home/assets/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('public/home/assets/css/nice-select.css') }}">
<link rel="stylesheet" href="{{ asset('public/home/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('public/home/assets/css/custom.css') }}">

    
</head>
<body class="full-wrapper">
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('public/home/assets/img/logo/loder.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    @include('home.header')
    @yield('content')
    @include('home.footer')
    <!--? Search model Begin -->
<div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Searching key.....">
        </form>
    </div>
</div>
<!-- Search model end -->
<!-- Scroll Up -->
{{-- <div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div> --}}



<!-- JS here -->
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('public/home/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('public/home/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('public/home/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('public/home/assets/js/bootstrap.min.js') }}"></script>

<!-- Slick-slider , Owl-Carousel ,slick-nav -->
<script src="{{ asset('public/home/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/home/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('public/home/assets/js/jquery.slicknav.min.js') }}"></script>

<!-- One Page, Animated-HeadLin, Date Picker -->
<script src="{{ asset('public/home/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('public/home/assets/js/animated.headline.js') }}"></script>
<script src="{{ asset('public/home/assets/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('public/home/assets/js/gijgo.min.js') }}"></script>

<!-- Nice-select, sticky,Progress -->
<script src="{{ asset('public/home/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('public/home/assets/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('public/home/assets/js/jquery.barfiller.js') }}"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="{{ asset('public/home/assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('public/home/assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('public/home/assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('public/home/assets/js/hover-direction-snake.min.js') }}"></script>

<!-- contact js -->
<script src="{{ asset('public/home/assets/js/contact.js') }}"></script>
<script src="{{ asset('public/home/assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('public/home/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/home/assets/js/mail-script.js') }}"></script>
<script src="{{ asset('public/home/assets/js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="{{ asset('public/home/assets/js/plugins.js') }}"></script>
<script src="{{ asset('public/home/assets/js/main.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<div id="whatsapp">
    <a href="https://wa.me/send?phone=8218808889" target="_blank">
      <img src="{{asset('/public/home/assets/img/gallery/whatsapp-icon.png')}}" alt="whatsapp-logo" height="80px" width="80px">
    </a>
  </div>
  
  <!-- Start of Tawk.to Script -->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {};
    var Tawk_LoadStart = new Date();
    (function() {
      var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
      s1.async = true;
      s1.src = 'https://embed.tawk.to/6488708ecc26a871b0224554/1h2qffbli';
      s1.charset = 'UTF-8';
      s1.setAttribute('crossorigin', '*');
      s0.parentNode.insertBefore(s1, s0);
    })();
  </script>
  <!-- End of Tawk.to Script -->
  
  <!-- CORS Configuration -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        xhrFields: {
          withCredentials: true
        }
      });
    });
  </script>

  
  
  
  
  
  
  
</body>
</html>