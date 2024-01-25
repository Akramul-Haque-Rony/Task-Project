@extends('layouts.adminTheme')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Modals & Alerts</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- Toastr -->
        {{-- <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css"> --}}
        <!-- Theme style -->
        {{-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css"> --}}
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">


            <!-- Content Wrapper. Contains page content -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">




                            <div class="card card-success card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-edit"></i>
                                        SweetAlert2 Examples
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-success swalDefaultSuccess">
                                        Launch Success Toast
                                    </button>
                                    <button type="button" class="btn btn-info swalDefaultInfo">
                                        Launch Info Toast
                                    </button>
                                    <button type="button" class="btn btn-danger swalDefaultError">
                                        Launch Error Toast
                                    </button>
                                    <button type="button" class="btn btn-warning swalDefaultWarning">
                                        Launch Warning Toast
                                    </button>
                                    <button type="button" class="btn btn-default swalDefaultQuestion">
                                        Launch Question Toast
                                    </button>
                                    <div class="text-muted mt-3">
                                        For more examples look at <a
                                            href="https://sweetalert2.github.io/">https://sweetalert2.github.io/</a>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- ./row -->
                </div>



            </section>
        </div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        {{-- <script src="../../plugins/jquery/jquery.min.js"></script> --}}
        <!-- Bootstrap 4 -->
        {{-- <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
        <!-- SweetAlert2 -->
        <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Toastr -->
        {{-- <script src="../../plugins/toastr/toastr.min.js"></script> --}}
        <!-- AdminLTE App -->
        {{-- <script src="../../dist/js/adminlte.min.js"></script> --}}
        <!-- AdminLTE for demo purposes -->
        {{-- <script src="../../dist/js/demo.js"></script> --}}
        <!-- Page specific script -->
        <script>
            // $(function() {
            //     var Toast = Swal.mixin({
            //         toast: true,
            //         position: 'top-end',
            //         showConfirmButton: false,
            //         timer: 3000
            //     });

            //     $('.swalDefaultSuccess').click(function() {
            //         Toast.fire({
            //             icon: 'success',
            //             title: 'Add Successfully.'
            //         })
            //     });
            // });
            document.querySelector('.widget-content .mixin').addEventListener('click', function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Data Saved successfully!!!'
                })
            })
        </script>
    </body>

    </html>
@endsection
