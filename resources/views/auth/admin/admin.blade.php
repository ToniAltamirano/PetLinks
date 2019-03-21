{{-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin</title>
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <!-- Load an icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#home"><i class="fa fa-fw fa-home"></i> Home</a>
            <a href="#services"><i class="fa fa-fw fa-wrench"></i> Services</a>
            <a href="#clients"><i class="fa fa-fw fa-user"></i> Clients</a>
            <a href="#contact"><i class="fa fa-fw fa-envelope"></i> Contact</a>
        </div>

        <!-- Use any element to open the sidenav -->
        <span onclick="openNav()">open</span>

        <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
        <div id="main">
        ...
        </div>
        <script>
            /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
            }

            /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
            }
        </script>
    </body>
</html> --}}



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/root.css') }}">
    <link rel="stylesheet" href="{{ asset('css/donantes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link rel="stylesheet" type="text/css"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="h-auto">
            <div class="sidebar-header">
                <a href="{{ url('/admin') }}">  <h3>PET LINKS</h3></a>
                <strong>PL</strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                        <a href="{{ url('/landing')}}">
                            <i class="fas fa-figther-jet"></i>
                            <b>Acciones rápidas</b>
                            </a>
                </li>
                <li class="">
                    <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle dropdown-nav-left">
                        <i class="fas fa-home"></i>
                        <b>Gestión</b>
                    </a>
                    <ul class="collapse list-unstyled" id="menu">

                        <li>
                            <a href="{{url('/donaciones') }}">Donaciones</a>
                        </li>
                        <li>
                            <a href="{{ url('/usuarios') }}">Usuarios</a>
                        </li>
                        <li>
                            <a href="{{ url('/donantes') }}">Donantes</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle dropdown-nav-left">
                        <i class="fas fa-copy"></i>
                        <b>Estadísticas</b>
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Gráficos</a>
                        </li>
                        <li>
                            <a href="#">Centros</a>
                        </li>
                    </ul>
                    <a href="#">
                        <i class="fas fa-briefcase"></i>
                        <b>Configuración</b>
                    </a>
                </li>

            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light" id="navbar-top">
                <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-bars" id="iconSidebar"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        {{-- Selección de idioma --}}
                        <li class="dropdown nav-item">
                            <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <span class="align-middle text-uppercase">{{ Config::get('app.locale') }}</span>
                                <i class="material-icons">language</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-with-icons sub">
                                <a id="lang_ca" class="dropdown-item" href="{{ url('/language', ['locale' => 'ca']) }}">Català</a>
                                <a id="lang_en" class="dropdown-item" href="{{ url('/language', ['locale' => 'en']) }}">English</a>
                                <a id="lang_es" class="dropdown-item" href="{{ url('/language', ['locale' => 'es']) }}">Español</a>
                            </div>
                        </li>

                        <!-- Sesión -->
                        <li class="dropdown nav-item">
                            <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="material-icons">account_circle</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-with-icons sub">
                                @if (Auth::check())
                                    <a class="dropdown-item" href="{{ url('/logout')}}">Logout</a>
                                @else
                                    <a class="dropdown-item" href="{{ url('/login')}}">{{ __('master.login') }}</a>
                                    <a class="dropdown-item" href="{{ url('/register')}}">{{ __('master.register') }}</a>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>


            <div class="">@yield('datos')</div>
		</div>
    </div>

    <!-- jQuery CDN - Slim version -->
    <script src="{{ asset('libs/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- Popper.JS -->
    <script src="{{ asset('libs/popper/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#tablePag').DataTable({
                dom: 'lBfrtip',
                buttons: [
                        {
                            extend: 'copy',
                            text: 'Copy',
                            className: 'bg-secondary ml-4',
                            key: {
                                key: 'c',
                                altKey: true
                            }
                        },
                        {
                            extend: 'excel',
                            text: 'Excel',
                            title: 'Donacions',
                            className: 'btn bg-secondary'
                        },
                        {
                            extend: 'pdf',
                            text: 'PDF',
                            title: 'Donacions',
                            className: 'bg-secondary'
                        },
                        {
                            extend: 'print',
                            text: 'Print',
                            className: 'bg-secondary'
                        }
                ],

                select: true
            });

            $('#sidebarCollapse').on('click', function () {
                //$('#sidebar').toggleClass('active');
                if($('#sidebar').css('margin-left') == "0px"){
                    $('#sidebar').css('margin-left', $('#sidebar').width()*-1);
                }
                else{
                    $('#sidebar').css('margin-left', "0px");
                }
            });
        });


        $('#myButton').on('click', function(event) {
            var tr = $('#tablePag tr');
            $('.selected').each(function() {
                var id = $(this).find("td:nth-child(1)").html();
                console.log(id);
            });           
        });

    </script>
</body>

</html>
