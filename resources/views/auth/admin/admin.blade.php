<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ __('admin.title') }}</title>
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}">
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
        <link rel="stylesheet" href="{{ asset('css/root.css') }}">
        <link rel="stylesheet" href="{{ asset('css/donantes.css') }}">
        <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">


        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

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
                    <a href="{{ url('/landing') }}">
                        <h3>PET LINKS</h3>
                    </a>
                </div>
                <ul class="list-unstyled components">
                    <li>
                        <a id="landing" href="{{ url('/landing')}}">
                            <i class="fas fa-bolt mx-1"></i>
                            <b>{{ __('admin.quick_actions') }}</b>
                        </a>
                    </li>
                    <hr class="mx-4 bg-white">
                    <li>
                        <a href="{{ url('/')}}">
                            <i class="fas fa-home mx-1"></i>
                            <b>{{ __('admin.home') }}</b>
                        </a>
                    </li>
                    <li>
                        <a href="#menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle dropdown-nav-left">
                            <i class="fas fa-briefcase mx-1"></i>
                            <b>{{ __('admin.management') }}</b>
                        </a>
                        <ul class="collapse list-unstyled" id="menu">
                            <li>
                                <a href="{{ url('/campaigns') }}">{{ __('admin.campaigns') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/centros') }}">{{ __('admin.centers') }}</a>
                            </li>
                            <li>
                                <a href="{{url('/donaciones') }}">{{ __('admin.donations') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/donantes') }}">{{ __('admin.donors') }}</a>
                            </li>
                            <li>
                                <a href="{{url('/patrons') }}">{{ __('admin.undefined') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/subtipos') }}">{{ __('admin.subtypes') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/tipos') }}">{{ __('admin.types') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/usuarios') }}">{{ __('admin.users') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle dropdown-nav-left">
                            <i class="fas fa-chart-line mx-1"></i>
                            <b>{{ __('admin.stats') }}</b>
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="{{ url('/graficos/donaciones') }}">{{ __('admin.donations') }}</a>
                            </li>
                            <li>
                                <a href="#">{{ __('admin.stats_centers') }}</a>
                            </li>
                        </ul>
                        <a href="#">
                            <i class="fas fa-cog mx-1"></i>
                            <b>{{ __('admin.config') }}</b>
                        </a>
                    </li>

                </ul>
            </nav>

            <!-- Page Content  -->
            <div id="content">
                <nav class="navbar navbar-expand navbar-light" id="navbar-top">
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
                <div class="container-fluid">@yield('datos')</div>
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

        <script src="https://cdn.datatables.net/plug-ins/1.10.19/i18n/Catalan.json"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                var table = $('#tablePag').DataTable({
                    language: {

                        "sProcessing":   "Processant...",
                        "sLengthMenu":   "Mostra _MENU_ registres",
                        "sZeroRecords":  "No s'han trobat registres.",
                        "sInfo":         "Mostrant de _START_ a _END_ de _TOTAL_ registres",
                        "sInfoEmpty":    "Mostrant de 0 a 0 de 0 registres",
                        "sInfoFiltered": "(filtrat de _MAX_ total registres)",
                        "sInfoPostFix":  "",
                        "sSearch":       "Filtrar:",
                        "sUrl":          "",
                        "oPaginate": {
                            "sFirst":    "Primer",
                            "sPrevious": "Anterior",
                            "sNext":     "Següent",
                            "sLast":     "Últim"
                        }

                     },
                    dom: 'lBfrtip',
                    buttons: [{
                                extend: 'copy',
                                text: 'Copy',
                                className: 'bg-secondary ml-4',
                                key: {
                                    key: 'c',
                                    altKey: true
                                }
                            }, {
                                extend: 'excel',
                                text: 'Excel',
                                title: 'Donacions',
                                className: 'btn bg-secondary'
                            }, {
                                extend: 'pdf',
                                text: 'PDF',
                                title: 'Donacions',
                                className: 'bg-secondary'
                            }, {
                                extend: 'print',
                                text: 'Print',
                                className: 'bg-secondary'
                            }
                    ],
                    select: true
                });

                //Aplicar filtro cuando se cambia el valor
                $('#filtro').on("click", function() {
                    table.draw();
                });

                 //Aplicar filtroDonantes cuando se cambia el valor
                 $('#filtroDonantes').on("click", function() {
                    table.draw();
                });

                $('#sidebarCollapse').on('click', function () {
                    //$('#sidebar').toggleClass('active');
                    if($('#sidebar').css('margin-left') == "0px"){
                        $('#sidebar').css('margin-left', $('#sidebar').width()*-1);
                    } else {
                        $('#sidebar').css('margin-left', "0px");
                    }
                });
            });

            //Función que filtra por el tipo de usuario
            $('#filtro').on('click', function(){

                $.fn.dataTableExt.afnFiltering.push(
                function( settings, data, dataIndex ) {
                    var tipoInput = document.getElementById('innputRol').value;
                    var type = data[5];
                    if ( tipoInput == type || tipoInput == 0)
                    {
                        return true;
                    }
                    return false;
                }
                );

                $('#exampleModalCenter').modal('toggle');
            });

            //Filtramos la tabla de donantes, con las valores marcados
            $('#filtroDonantes').on('click', function(){

                // Filtro tipo donante
                $.fn.dataTableExt.afnFiltering.push(
                    function( settings, data, dataIndex ) {
                        var tipoInput = document.getElementById('tipoDonante').value;
                        var type = data[2];
                        if ( tipoInput == type || tipoInput == 0)
                        {
                            return true;
                        }
                        return false;
                    }
                );

                // Filtro es_habitual
                $.fn.dataTableExt.afnFiltering.push(
                    function( settings, data, dataIndex ) {
                        var tipoInput = document.getElementById('habitual').value;
                        var type = data[3];
                        if ( tipoInput == type || tipoInput == 0)
                        {
                            return true;
                        }
                        return false;
                    }
                );

                // Filtro es_habitual
                $.fn.dataTableExt.afnFiltering.push(
                    function( settings, data, dataIndex ) {
                        var tipoInput = document.getElementById('tieneAnimales').value;
                        var type = data[4];
                        if ( tipoInput == type || tipoInput == 0)
                        {
                            return true;
                        }
                        return false;
                    }
                );

                $('#exampleModalCenter').modal('toggle');
            });


            $('#myButton').on('click', function(event) {
                // var tr = $('#tablePag tr');
                // $('.selected').each(function() {
                //     var id = $(this).find("td:nth-child(1)").html();
                //     console.log(id);
                // });

                var row = $("#tablePag").DataTable().row('.selected').data();
                alert(row[0]);
                var id = row[0];

                $('#formularioEdit').attr('action', "http://localhost:8080/PetLinks/public/usuarios/" + id + "/edit");
                $('#formularioEdit').submit();


            });

            function eliminar(){
                var row = $("#tablePag").DataTable().row('.selected').data();
                alert(row[0]);
                var id = row[0];

                $('#formularioDelete').attr('action', "http://localhost:8080/PetLinks/public/usuarios/" + id);
                $('#formularioDelete').submit();
            }

        </script>
        @yield('scripts')
    </body>
</html>
{{-- http://www.abp-politecnics.com/2019/daw/projecte02/dw05/public/usuarios/ --}}
