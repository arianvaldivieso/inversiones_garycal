<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Panel de control - @yield('title')</title>

        <!-- Global stylesheets -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="{{url('template')}}/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="{{url('template')}}/assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{{url('template')}}/assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
        <link href="{{url('template')}}/assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
        <link href="{{url('template')}}/assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    </head>
    <body class="sidebar-xs">

        <div class="navbar navbar-inverse">
            <div class="navbar-header">
                {{-- <a class="navbar-brand" href="index.html"><img src="{{url('template')}}/assets/images/logo_light.png" alt=""></a> --}}

                <ul class="nav navbar-nav visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                    <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>
            </div>

            <div class="navbar-collapse collapse" id="navbar-mobile">
                <ul class="nav navbar-nav">
                    <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>


                </ul>

                <p class="navbar-text"><span class="label bg-success-400">Bienvenido {{Auth::user()->email}}</span></p>

                {{-- <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown language-switch">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{url('template')}}/assets/images/flags/gb.png" class="position-left" alt="">
                            English
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="deutsch"><img src="{{url('template')}}/assets/images/flags/de.png" alt=""> Deutsch</a></li>
                            <li><a class="ukrainian"><img src="{{url('template')}}/assets/images/flags/ua.png" alt=""> Українська</a></li>
                            <li><a class="english"><img src="{{url('template')}}/assets/images/flags/gb.png" alt=""> English</a></li>
                            <li><a class="espana"><img src="{{url('template')}}/assets/images/flags/es.png" alt=""> España</a></li>
                            <li><a class="russian"><img src="{{url('template')}}/assets/images/flags/ru.png" alt=""> Русский</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-bubbles4"></i>
                            <span class="visible-xs-inline-block position-right">Messages</span>
                            <span class="badge bg-warning-400">2</span>
                        </a>

                        <div class="dropdown-menu dropdown-content width-350">
                            <div class="dropdown-content-heading">
                                Messages
                                <ul class="icons-list">
                                    <li><a href="#"><i class="icon-compose"></i></a></li>
                                </ul>
                            </div>

                            <ul class="media-list dropdown-content-body">
                                <li class="media">
                                    <div class="media-left">
                                        <img src="{{url('template')}}/assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                        <span class="badge bg-danger-400 media-badge">5</span>
                                    </div>

                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">James Alexander</span>
                                            <span class="media-annotation pull-right">04:58</span>
                                        </a>

                                        <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left">
                                        <img src="{{url('template')}}/assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                        <span class="badge bg-danger-400 media-badge">4</span>
                                    </div>

                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">Margo Baker</span>
                                            <span class="media-annotation pull-right">12:16</span>
                                        </a>

                                        <span class="text-muted">That was something he was unable to do because...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left"><img src="{{url('template')}}/assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">Jeremy Victorino</span>
                                            <span class="media-annotation pull-right">22:48</span>
                                        </a>

                                        <span class="text-muted">But that would be extremely strained and suspicious...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left"><img src="{{url('template')}}/assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">Beatrix Diaz</span>
                                            <span class="media-annotation pull-right">Tue</span>
                                        </a>

                                        <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-left"><img src="{{url('template')}}/assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                                    <div class="media-body">
                                        <a href="#" class="media-heading">
                                            <span class="text-semibold">Richard Vango</span>
                                            <span class="media-annotation pull-right">Mon</span>
                                        </a>

                                        <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                                    </div>
                                </li>
                            </ul>

                            <div class="dropdown-content-footer">
                                <a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown dropdown-user">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{url('template')}}/assets/images/placeholder.jpg" alt="">
                            <span>Victoria</span>
                            <i class="caret"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                            <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                            <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                            <li><a href="#"><i class="icon-switch2"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul> --}}
            </div>
        </div>


        <div class="page-container">

        <!-- Page content -->
            <div class="page-content">

                <!-- Main sidebar -->
                <div class="sidebar sidebar-main" style="height: 100vh;">
                    <div class="sidebar-content">

                        <!-- User menu -->
                        <div class="sidebar-user">
                            <div class="category-content">
                                <div class="media">
                                    {{-- <a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a> --}}
                                    <div class="media-body">
                                        <span class="media-heading text-semibold">{{Auth::user()->name}}</span>
                                        <div class="text-size-mini text-muted">
                                            <i class="icon-pin text-size-small"></i> &nbsp;Inversiones Garical c.a
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- /user menu -->


                        <!-- Main navigation -->
                        <div class="sidebar-category sidebar-category-visible">
                            <div class="category-content no-padding">
                                <ul class="navigation navigation-main navigation-accordion">

                                    <!-- Main -->
                                    <li class="navigation-header"><span>Menu</span> <i class="icon-menu" title="Main pages"></i></li>
                                    <li class=""><a href="index.html"><i class="icon-home4"></i> <span>Inicio</span></a></li>

                                    <li class=""><a href="{{url('admin/propiedades')}}"><i class="icon-office"></i> <span>Propiedades</span></a></li>
                                    <li class=""><a href="{{url('admin/caracteristicas')}}"><i class="icon-cabinet"></i> <span>Caracteristicas</span></a></li>

                                </ul>
                            </div>
                        </div>
                        <!-- /main navigation -->

                    </div>
                </div>
                <!-- /main sidebar -->


                <!-- Main content -->
                <div class="content-wrapper">



                    <!-- Content area -->
                    <div class="content">

                       @yield('content')



                        <!-- Footer -->
                        <div class="footer text-muted">
                            &copy; {{date("Y")}}. <a href="#">Inversiones Garycal c.a</a> Por <a href="#" target="_blank">Arian valdivieso</a>
                        </div>
                        <!-- /footer -->

                    </div>
                    <!-- /content area -->

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>


    </body>

    <script type="text/javascript" src="{{url('template')}}/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="{{url('template')}}/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('template')}}/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{url('template')}}/assets/js/plugins/loaders/blockui.min.js"></script>

    <script type="text/javascript" src="{{url('template')}}/assets/js/core/app.js"></script>

    @yield('scripts')

</html>
