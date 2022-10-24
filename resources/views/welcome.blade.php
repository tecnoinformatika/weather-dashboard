<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Prueba técnica Jesús Ortega</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body>

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        <a href="{{ url('/home') }}" class="logo">
                            <i class="mdi mdi-bowling text-success mr-1"></i> <span class="hide-phone">Weather</span>
                        </a>

                    </div>
                    <!-- End Logo container-->
                    <div class="menu-extras topbar-custom">

                        <ul class="list-unstyled float-right mb-0">
            
                            <!-- language-->
                            <li class="list-inline-item dropdown notification-list">
                        
                                    <label class="col-sm-2 col-form-label">Ciudad</label>
                                    <div class="col-sm-10">
                                        <select onchange="weatherFunc();" class="custom-select search-input">
                                            <option selected="">Seleccione una ciudad a consultar</option>
                                            <option value="miami">Miami</option>
                                            <option value="orlando">Orlando</option>
                                            <option value="new york">New York</option>
                                        </select>
                                    </div>
                              
                            </li>
                            <li class="menu-item list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
                        </ul>
                    </div>

                    
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="{{ url('/home') }}"><i class="dripicons-device-desktop"></i>Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="{{ url('/historial') }}"><i class="dripicons-to-do"></i>Historial</a>                                
                            </li>

                          

                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-right hide-phone">
                                <ul class="list-inline">
                                    
                                    <li class="list-inline-item">
                                        <span class="text-muted"><span class="date-text"></span></span>
                                        <span class="time-text"></span>
                                    </li>
                                </ul>                                
                            </div>
                            
                            <h4 class="page-title"><span class="location-city"></span></h4>
                            <div class="btn-group mt-2"> 
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><span class="location-country"></span></li>
                                    <li class="breadcrumb-item active"> <span class="location-region"></span></li>
                                </ol>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row estadisticas">
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="icon-contain">
                                            <div class="row">
                                                <div class="col-2 align-self-center">
                                                    <i class="fas fa-cloud text-gradient-info"></i>
                                                </div>
                                                <div class="col-10 text-right">
                                                    <h2>Humedad: <span class="humidity"></span></h2>
                                                    <p>Preción: <span class="pressure"></span></p>
                                                   <br>
                                                </div>
                                            </div>                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body justify-content-center">
                                        <div class="icon-contain">
                                            <div class="row">
                                                <div class="col-2 align-self-center">
                                                    <i class="far fa-gem text-gradient-danger"></i>
                                                </div>
                                                <div class="col-10 text-right">
                                                    <p class="sunrise-text"> <span class="sun-emoji"> 🌤️ </span> Amanecer: 
                                                        <span class="sunrise"></span>
                                                       </p> 
                                                       <p class="sunset-text"> <span class="cloud-emoji"> ⛅ </span>Puesta del Sol: 
                                                        <span class="sunset"></span>
                                                        </p>
                                                </div>
                                            </div>                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="icon-contain">
                                            <div class="row">
                                                <div class="col-2 align-self-center">
                                                    <p class="weather-temp-emoji">☀️</p>
                                                </div>
                                                <div class="col-10 text-right">
                                                    <h2 class="weather-temp"></h2>
                                                    <p class="weather-report"></p>
                                                
                                                </div>
                                                    
                                                    
                                            </div>                                                        
                                        </div>                                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="icon-contain">
                                            <div class="row">
                                                <div class="col-2 align-self-center">
                                                    <i class="fas fa-map text-gradient-primary"></i>
                                                </div>
                                                <div class="col-10 text-right">
                                                    latitud: <span class="latitude"></span><br>
                                                    Longitud:<span class="longitude"></span><br>
                                                    Zona Horaría:<span class="timezone"></span>    
                                                </div>
                                            </div>                                                        
                                        </div>                                                    
                                    </div>
                                </div>
                            </div>                                             
                        </div> 
                        <div class="card">
                            <div class="card-body">
                                
                                <h5 class="header-title mb-4 mt-0">Mapa</h5>
                                <div id="map" class="gmaps"></div>
                            </div>
                        </div>                                    
                    </div>
                                                 
                </div>
                <div class="row">
                    
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                
                                <h5 class="header-title pb-3 mt-0">Ciudades consultadas</h5>
                                <div class="table-responsive boxscroll" style="overflow: hidden; outline: none;">
                                    <table class="table mb-0">                                                                
                                        <tbody id="tablaciudades">
                                               
                                           
                                                                                        
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4  col-lg-6">
                        <div class="card timeline-card">
                            <div class="card-body p-0">                               
                                <div class="bg-gradient2 text-white text-center py-3 mb-4">
                                    <p class="mb-0 font-18"><i class="mdi mdi-clock-outline font-20"></i> Log de consultas</p>                                       
                                </div>
                            </div>
                            <div class="card-body boxscroll">
                                <div class="timeline" id="datos-log">
                                    
                                    
                                                                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © Jesús Elías Ortega Garcia
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- jQuery  -->
     
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- KNOB JS -->
        <script src="assets/plugins/jquery-knob/excanvas.js"></script>
        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script> 

        <script src="https://maps.google.com/maps/api/js?key=AIzaSyCJa7k9ET8mi2hxvdCprOxa-4o0lAI8IA0"></script>
        <!-- Gmaps file -->
        <script src="assets/plugins/gmaps/gmaps.min.js"></script>
        <script src="assets/js/main.js"></script>
        <!-- demo codes -->
       
        <script src="assets/pages/dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        
       
    </body>
</html>