<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{url('template')}}/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="{{url('template')}}/assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('template')}}/assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('template')}}/assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('template')}}/assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{url('template')}}/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="{{url('template')}}/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('template')}}/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{url('template')}}/assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script type="text/javascript" src="{{url('template')}}/assets/js/core/app.js"></script>
    <!-- /theme JS files -->

</head>

<body>




    <!-- Page container -->
    <div class="page-container login-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">

                    <!-- Simple login form -->
                    <form action="/autenthicate" method="post">
                        @csrf
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                                <h5 class="content-group">Accede a tu cuenta <small class="display-block">ingresa tus credenciales</small></h5>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" class="form-control" placeholder="Email" value="inversionesgarycal@gmail.com" name="email">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" class="form-control" placeholder="Contraseña" value="123456789" name="password">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Ingresar <i class="icon-circle-right2 position-right"></i></button>
                            </div>

                        </div>
                    </form>
                    <!-- /simple login form -->


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
    <!-- /page container -->

</body>
</html>
