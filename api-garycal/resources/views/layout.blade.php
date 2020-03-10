<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href="{{url('/')}}/assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/jquery.slider.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/owl.transitions.css" type="text/css">
    <link rel="stylesheet" href="{{url('/')}}/assets/css/style.css" type="text/css">

    <title>Inversiones Garycal | Inicio</title>

</head>

<body class="page-homepage navigation-fixed-top page-slider" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90">
<!-- Wrapper -->
    <div class="wrapper">
        <div class="navigation" style="position: relative !important;">
            <div class="secondary-navigation">
              <div class="container">
                  <div class="user-area">
                      <a href="https://wa.me/584163912651?text=Me gustaria tener informacion de sus servicios - Contacto desde la pagina web"><strong>Telefono:</strong> 0416-391-2651 </a>
                      <a><strong>Email:</strong> inversionesgarycal@gmail.com </a>
                  </div>
                  <!-- <div class="user-area">
                      <div class="language-bar">
                          <a href="#">
                            <div style="width: 40px;" class="fa fa-facebook btn"></div>
                          </a>
                          <a href="#">
                            <div style="width: 40px;" class="fa fa-instagram btn"></div>
                          </a>
                      </div>
                  </div> -->
              </div>
            </div>
            <div class="container">
              <header class="navbar" id="top" role="banner">
                  <div class="navbar-header">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                      </button>
                      <div class="navbar-brand nav" id="brand">
                          <a href="{{url('/')}}"><img src="{{url('/')}}/assets/img/logo.png" alt="brand"></a>
                      </div>
                  </div>
                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                      <ul class="nav navbar-nav">
                          <li><a href="{{url('/')}}">Inicio</a></li>
                          <li><a href="{{url('propiedades')}}">Propiedades</a></li>
                          <li><a href="{{url('quienes-somos')}}">Quienes Somos</a></li>

                      </ul>
                  </nav><!-- /.navbar collapse-->

              </header><!-- /.navbar -->
            </div><!-- /.container -->
            </div><!-- /.navigation -->

        @yield('slider')

        <div id="page-content">
            @yield('content')
        </div>


        <footer id="page-footer">
            <div class="inner">
                <aside id="footer-main">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <article>
                                    <h3>Quienes somos</h3>
                                    <p>Somos una empresa capaz de crear soluciones modernas, funcionales y sostenibles, satisfaciendo todos los aspectos de la arquitectura e ingeniería de la manera más eficiente y práctica, proporcionando propuestas innovadoras y vanguardistas, manteniendo los mejores estándares de calidad en nuestros procesos constructivos de la mano a ofrecer las mejores opciones en el mercado inmobiliario con el mejor respaldo funcional y legal que certifiquen la "Garantía y Calidad" que se requiere
                                    </p>
                                </article>
                            </div><!-- /.col-sm-3 -->
                            <div class="col-md-3 col-sm-3">

                            </div><!-- /.col-sm-3 -->
                            <div class="col-md-3 col-sm-3">
                                <article>
                                    <h3>Contactanos</h3>
                                    <address>
                                        <strong>Inversiones GARYCAL, C.A </strong><br>
                                        Ciudad Bolívar<br>
                                        Venezuela
                                    </address>
                                    <a style="text-decoration: none;" href="https://wa.me/584163912651?text=Me gustaria tener informacion de sus servicios - Contacto desde la pagina web" target="_blank">0416-391-2651 </a>!<br>
                                    <a href="#">Inversionesgarycal@gmail.com</a>
                                </article>
                            </div><!-- /.col-sm-3 -->

                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </aside><!-- /#footer-main -->
                <aside id="footer-thumbnails" class="footer-thumbnails"></aside><!-- /#footer-thumbnails -->
                <aside id="footer-copyright">
                    <div class="container">
                        <span>Copyright © 2020 - {{date('y')}}. todos los derechos reservados.</span>
                        <span class="pull-right"><a href="#page-top" class="roll">ir arriba</a></span>
                    </div>
                </aside>
            </div><!-- /.inner -->
        </footer>
        <!-- end Page Footer -->
    </div>

    <div id="overlay"></div>

    <script type="text/javascript" src="{{url('/')}}/assets/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/js/smoothscroll.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/js/icheck.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/js/jquery.vanillabox-0.1.5.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/js/retina-1.1.0.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/assets/js/custom.js"></script>
    <!--[if gt IE 8]>
    <script type="text/javascript" src="{{url('/')}}/assets/js/ie.js"></script>
    <![endif]-->

    <script>
        $(window).load(function(){
            initializeOwl(false);
        });
    </script>

    </body>
</html>
