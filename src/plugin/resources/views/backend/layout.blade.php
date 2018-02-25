<!DOCTYPE html>
<html>
    <head>
        <base href='{{URL::to('/public/') }}' />
        <script>var base = '{{ URL::to('/public/') }}';</script>
        <meta charset="utf-8">
        <!--<link rel="shortcut icon" type="image/png" href="assets/front/images/icons/fav.png">-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') </title>
        <link href="./assets/backend/ui/css/bootstrap.min.css" rel="stylesheet">
        <link href="./assets/backend/ui/font-awesome/css/font-awesome.css" rel="stylesheet">
        <!-- Jquery 2.1.1 -->
        <script src="./assets/backend/ui/js/jquery-2.1.1.js"></script>

        <link href="./assets/backend/ui/css/animate.css" rel="stylesheet">
        <link href="./assets/backend/ui/css/style.css" rel="stylesheet">
    </head>    
    <body class="fixed-sidebar no-skin-config full-height-layout">
        

        <div id="wrapper">

            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    
                </div>
            </nav>

            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="{{\URL::Current().'#'}}"><i class="fa fa-bars"></i> </a>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <a data-guarded="1" href="{{url('/backend/auth/logout')}}">
                                    <i class="fa fa-sign-out"></i> Sign Out
                                </a>
                            </li>
                        </ul>

                    </nav>
                </div>
                @yield('content')
                <div class="footer">
                    
                </div>

            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="./assets/backend/ui/js/bootstrap.min.js"></script>
        <script src="./assets/backend/functions.js"></script>
        @yield('js')
        @yield('footer-js')
        <script>

            
        </script>
        <!-- Page-Level Scripts -->
        <script>
            $(document).ready(function () {
                $('a[href="https://froala.com/wysiwyg-editor"]').remove();
            });
        </script>
    </body>
</html>