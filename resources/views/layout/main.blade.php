<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>Penyewaan Gedung</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="/images/favicon.png" type="image/png">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="/css/magnific-popup.css">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="/css/slick.css">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="/css/LineIcons.css">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="/css/default.css">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
  
  <style>
    .text-kecil{
      font-size: 14px;
    }
  </style>    
</head>

<body>    
    <!--====== NAVBAR TWO PART START ======-->
    <section class="navbar-area p-0 @yield('bg-primary')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg py-2">
                           <!-- Image and text -->
                            <a class="navbar-brand" href="/">
                                <img src="/images/logo.svg" height="40" class="d-inline-block align-top" alt="">
                            </a>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                            </div>
                            
                            <div class="navbar-btn m-auto">
                                <ul>
                                    <!-- jika punya session email (artinya sudah login) -->
                                    @if(session()->has('email'))
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-light text-primary dropdown-toggle font-weight-bold py-2 py-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ session()->get('email') }}
                                          </button>
                                          <div class="dropdown-menu">
                                            <a class="dropdown-item" href="/history">History penyewaan</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="/logout">Logout</a>
                                          </div>
                                        </div>
                                    @else
                                        <li><a class="solid" href="/login">Login</a></li>
                                    @endif
                                </ul>
                            </div>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>


    @yield('main')


    <div class="bg-primary">
        <div class="container py-2">
            <p style="font-size: 14px; color: white;">Copyright © 2020 Website Penyewaan Gedung</p>
        </div>
    </div>
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->    



    <!--====== Jquery js ======-->
    <script src="/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/js/vendor/modernizr-3.7.1.min.js"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    
    <!--====== Slick js ======-->
    <script src="/js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="/js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="/js/ajax-contact.js"></script>
    
    <!--====== Isotope js ======-->
    <script src="/js/imagesloaded.pkgd.min.js"></script>
    <script src="/js/isotope.pkgd.min.js"></script>
    
    <!--====== Scrolling Nav js ======-->
    <script src="/js/jquery.easing.min.js"></script>
    <script src="/js/scrolling-nav.js"></script>
    
    <!--====== Main js ======-->
    <script src="/js/main.js"></script>
    
</body>

</html>
