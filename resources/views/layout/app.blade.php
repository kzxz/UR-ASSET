<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <link rel="icon" type="image/png" href="{{URL::asset('/')}}" sizes="16x16">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{URL::asset('/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/css/datatables.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('/css/font-awesome-4.7.0/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('/css/morris.css')}}">


    <script src="{{URL::asset('/js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{URL::asset('/js/popper.min.js')}}"></script>
    <script src="{{URL::asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('/js/bootstrap3.4.0.min.js')}}"></script>
    <script src="{{URL::asset('/js/jQuery.print.min.js')}}"></script>
    <script src="{{URL::asset('/js/raphael-v2.1.0-min.js')}}"></script>
    <script src="{{URL::asset('/js/datatables.min.js')}}"></script>

    <title>UR-ASSET</title>
    {{--{!! Charts::assets() !!}--}}



    <style>

        #body-row {
            margin-left:0;
            margin-right:0;
        }
        #sidebar-container {
            min-height: 100vh;
            background-color: #333;
            padding: 0;
        }

        /* Sidebar sizes when expanded and expanded */
        .sidebar-expanded {
            width: 230px;
        }
        .sidebar-collapsed {
            width: 60px;
        }

        /* Menu item*/
        #sidebar-container .list-group a {
            height: 50px;
            color: white;
        }

        /* Submenu item*/
        #sidebar-container .list-group .sidebar-submenu a {
            height: 45px;
            padding-left: 30px;
        }
        .sidebar-submenu {
            font-size: 0.9rem;
        }

        /* Separators */
        .sidebar-separator-title {
            background-color: #333;
            height: 35px;
        }
        .sidebar-separator {
            background-color: #333;
            height: 25px;
        }
        .logo-separator {
            background-color: #333;
            height: 60px;
        }

        /* Closed submenu icon */
        #sidebar-container .list-group .list-group-item[aria-expanded="false"] .submenu-icon::after {
            content: " \f0d7";
            font-family: FontAwesome, serif;
            display: inline;
            text-align: right;
            padding-left: 10px;
        }
        /* Opened submenu icon */
        #sidebar-container .list-group .list-group-item[aria-expanded="true"] .submenu-icon::after {
            content: " \f0da";
            font-family: FontAwesome;
            display: inline;
            text-align: right;
            padding-left: 10px;
        }
        body
        {
         background-color: #265077;
        }
        .font-color
        {
            color: snow;
            font-size: 14px;
            font-family: "Times New Roman";

        }

    </style>

</head>
<body>

    <!-- Bootstrap NavBar -->
    <nav class="navbar navbar-expand-md navbar-light"  style="background-color: #022140">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/home">
            <span class=" font-color">MIC P ICT GROUP THESIS BOOK-KEEPING</span>
        </a>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" style="color: snow; font-family: 'Times New Roman'" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" style="color: snow; font-family: 'Times New Roman'" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>



    </nav><!-- NavBar END -->


    <!-- Bootstrap row -->
    <div class="row" id="body-row">
        <!-- Sidebar -->
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
            <!-- Bootstrap List Group -->
            <ul class="list-group">
                <!-- Separator with title -->
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>MAIN MENU</small>
                </li>
                <!-- /END Separator -->
                <!-- Menu with submenu -->
                <a href="{{URL('/home')}}" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-home fa-fw mr-3"></span>
                        <span class="menu-collapsed">Home</span>
                    </div>
                </a>
                <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-dashboard fa-fw mr-3"></span>
                        <span class="menu-collapsed">Dashboard</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <!-- Submenu content -->
                <div id='submenu1' class="collapse sidebar-submenu">
                    <a href="production" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed"> EGG PRODUCTION</span>
                    </a>
                    <a href="{{URL('/egg_sales')}}" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">EGG SALES</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">EGG-KEEPING</span>
                    </a>
                </div>
                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-user fa-fw mr-3"></span>
                        <span class="menu-collapsed">Profiles</span>
                        <span class="submenu-icon ml-auto"></span>
                    </div>
                </a>
                <!-- Submenu content -->
                <div id='submenu2' class="collapse sidebar-submenu">
                    <a href="{{route('watchers')}}" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">WATCHERS</span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">MONITORS</span>
                    </a>
                </div>
                {{--<a href="#" class="bg-dark list-group-item list-group-item-action">--}}
                    {{--<div class="d-flex w-100 justify-content-start align-items-center">--}}
                        {{--<span class="fa fa-info fa-fw mr-3"></span>--}}
                        {{--<span class="menu-collapsed">ABOUT US</span>--}}
                    {{--</div>--}}
                {{--</a>--}}
                <!-- Separator with title -->
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>OPTIONS</small>
                </li>
                <!-- /END Separator -->
                <a href="#" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-cogs fa-fw mr-3"></span>
                        <span class="menu-collapsed">SETTINGS</span>
                    </div>
                </a>
                {{--<a href="#" class="bg-dark list-group-item list-group-item-action">--}}
                    {{--<div class="d-flex w-100 justify-content-start align-items-center">--}}
                        {{--<span class="fa fa-envelope-o fa-fw mr-3"></span>--}}
                        {{--<span class="menu-collapsed">Messages <span class="badge badge-pill badge-primary ml-2">lance</span></span>--}}
                    {{--</div>--}}
                {{--</a>--}}
                <!-- Separator without title -->
                <li class="list-group-item sidebar-separator menu-collapsed"></li>
                <!-- /END Separator -->
                <a href="#" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="fa fa-question fa-fw mr-3"></span>
                        <span class="menu-collapsed">Help</span>
                    </div>
                </a>
                <a href="#" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                        <span id="collapse-text" class="menu-collapsed">Collapse</span>
                    </div>
                </a>

            </ul><!-- List Group END-->
        </div><!-- sidebar-container END -->

        <!-- MAIN -->
        <div class="" style="background-color: rgba(0,0,0,0.5); height: auto; width: 1119px;">
            <div class="" id="container" >
        @yield('content')
            </div>


        </div>
        <!-- Main Col END -->

    </div><!-- body-row END -->
<script>
    // Hide submenus
    $('#body-row .collapse').collapse('hide');

    // Collapse/Expand icon
    $('#collapse-icon').addClass('fa-angle-double-left');

    // Collapse click
    $('[data-toggle=sidebar-colapse]').click(function() {
        SidebarCollapse();
    });

    function SidebarCollapse () {
        $('.menu-collapsed').toggleClass('d-none');
        $('.sidebar-submenu').toggleClass('d-none');
        $('.submenu-icon').toggleClass('d-none');
        $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');

        // Treating d-flex/d-none on separators with title
        var SeparatorTitle = $('.sidebar-separator-title');
        if ( SeparatorTitle.hasClass('d-flex') ) {
            SeparatorTitle.removeClass('d-flex');
        } else {
            SeparatorTitle.addClass('d-flex');
        }

        // Collapse/Expand icon
        $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
    }
</script>
    </body>
</html>
