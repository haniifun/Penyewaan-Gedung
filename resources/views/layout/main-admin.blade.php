
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <!-- NAV TOP -->
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin">Data admin</a> 
            </div>
            <div style="color: white;
                    padding: 15px 50px 5px 50px;
                    float: right;
                    font-size: 16px;"> 
                    Data Admin : Penyewaan Gedung &nbsp; 
                    <a href="/logout" class="btn btn-danger square-btn-adjust">Logout</a>
            </div>
        </nav>   
        <!-- /. NAV TOP  -->

        <!-- NAV SIDE -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="/img/user.jpg" class="user-image img-responsive"/>
                    </li>
                    <li> 
                        <a href="/admin"><i class="fa fa-dashboard fa-3x"></i> Home </a> 
                    </li>
                    <li>
                        <a href="/data-gedung"><i class="fa fa-dashboard fa-3x"></i> Gedung </a> 
                    </li>
                    <li> 
                        <a href="/data-penyewaan"><i class="fa fa-dashboard fa-3x"></i> Penyewaan </a> 
                    </li>
                    <li> 
                        <a href="/data-pembayaran"><i class="fa fa-dashboard fa-3x"></i> Status Pembayaran </a> 
                    </li>
                    <li> 
                        <a href="/data-pelanggan"><i class="fa fa-dashboard fa-3x"></i> Pelanggan </a> 
                    </li>
                    <li> 
                        <a href="/logout"><i class="fa fa-dashboard fa-3x"></i> LogOut </a> 
                    </li>
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper" >
            <div id="page-inner">
                
                <!-- tempat untuk kode section('main') -->
                @yield('main')

            </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="/js/morris/raphael-2.1.0.min.js"></script>
    <script src="/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="/js/custom.js"></script>
    
   
</body>
</html>
