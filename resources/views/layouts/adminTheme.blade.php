<!DOCTYPE html>
<html lang="en">

<head>
    <title> @yield('title') - grocery shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <title>Logbook</title> --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link href="{{ asset('open-iconic-master/font/css/open-iconic-bootstrap.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custome.css') }}">
    <!-- DataTables -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"> --}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('dist/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

    {{-- For ajax search --}}
    {{-- <link rel="stylesheet" href="{{ asset('js/jquery-ui.css') }}"> --}}
    {{-- <script src="{{ asset('js/jquery-ui.js') }}"></script> --}}
    <script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li> --}}
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Help
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">FAQ</a>
                            <a class="dropdown-item" href="#">Support</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Contact</a>
                        </div>
                    </li> --}}
                </ul>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="DACBD Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i style="text-align: center">{{ Auth::user()->name }}</i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item"><a href="/" class="nav-link">
                                <i class="fa fa-home fa-fw"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    CRM
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('customer.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Coustomer</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('supplier.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Supplier</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('friend.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Friends</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>
                                    Funds
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('income.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Income</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('expense.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Expense</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('loan.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Loan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Reports
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('report.profitLoss')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profit/Loss</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>

        <footer class="main-footer a1" >
            <strong>&copy;2022 <a href="https://technolabbd.com">Develop By Rony</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
    </div>

    
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script> --}}
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- jQuery -->
    {{-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> --}}
    <!-- AdminLTE App -->
    {{-- <script src="{{ asset('dist/js/adminlte.min.js') }}"></script> --}}
    {{-- Dont Open this script --}}

    <!-- DataTables  & Plugins -->
    {{-- <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script> --}}

    {{-- Ajax --}}
    <script src="{{ asset('js/searchAjax.js') }}"></script>
    <script>
        $(".brand_name").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "searchBrand",
                    data: {
                        term: request.term
                    },
                    dataType: "json",
                    success: function(data) {
                        var resp = $.map(data, function(obj) {
                            return obj.brand_name;
                        });
                        response(resp);
                    }
                });
            },
            minLength: 2
        });
    </script>
    {{-- <script src="/plugins/jquery/jquery.min.js"></script> --}}
    <!-- overlayScrollbars -->
    <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- Select2 -->
    <script src="/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="/plugins/moment/moment.min.js"></script>
    <!-- date-range-picker -->
    <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <!-- AdminLTE App -->
    {{-- <script src="/js/adminlte.js"></script> --}}

    <!-- OPTIONAL SCRIPTS -->
    <script src="/js/demo.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="/plugins/raphael/raphael.min.js"></script>
    <script src="/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="/plugins/chart.js/Chart.min.js"></script>
    <!-- jquery-validation -->
    <script src="/plugins/jquery-validation/jquery.validate.min.js"></script>
    {{-- <script async src="//code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> --}}
    <!-- PAGE SCRIPTS -->
    <script src="/js/custom.js"></script>
    <script src="/js/custom2.js"></script>
    <script src="/js/appajax.js"></script>
    





   

    <style>
        .select2 .select2-selection--single {
            height: 38px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 38px !important;
        }

        .thead {
            background: #32CD32;
            color: #000;
            height: 38px !important;
        }

        .thead1 {
            background: #f4e98c;
            color: #000;
            height: 38px !important;
        }

        .thead2 {
            background: #b6b7b2;
            color: #000;
            height: 38px !important;
        }

        .thead3 {
            background: #ea700d;
            color: #fff;
            height: 38px !important;
        }

        .table1 {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }

        .ElectricB {

            border-right: 2px solid black;

        }


        /*For profile picture upload*/
        #imageUpload {
            display: none;
        }

        #profileImage {
            cursor: pointer;
        }

        #profile-container {
            width: 130px;
            height: 130px;
            overflow: hidden;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
            border-radius: 50%;
        }

        #profile-container img {
            width: 130px;
            height: 130px;
        }
    </style>
</body>

</html>
