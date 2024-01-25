@extends('layouts.adminTheme')
@section('title', 'Profit-Loss')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profit-Loss</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="">Report</a></li>
                        <li class="breadcrumb-item"><a href="?"><u>Profit-Losss</u></a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @php
        $perpage = app('request')->input('plimit') > 0 ? app('request')->input('plimit') : 10;
    @endphp
    @if (session('error'))
        <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-x close" data-bs-dismiss="alert">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg></button> <strong>Error!</strong> {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-x close" data-bs-dismiss="alert">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button> <strong>Error!</strong> {{ $error }}
            </div>
        @endforeach
    @endif

    @if (Session::has('success'))
        <div class="widget-content">
            <div class="swalDefaultInfo"></div>
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="col-md-12">
                <form action="">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" class="form-control form-control-sm" name="date1" placeholder=""
                                    value="{{ request()->input('date1') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">to Date</label>
                                <input type="date" class="form-control form-control-sm" name="date2" placeholder=""
                                    value="{{ request()->input('date2') }}" >
                            </div>
                        </div>
                        <div class="col-md-7"></div>
                        <div class="from-group col-md-1 ">
                            <br>
                            <button type="submit" class="float-right btn btn-sm btn-default" style="margin-top: 8px">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body table-responsive p-0">

                            <table class="table table-hover  table-striped">
                                <thead>
                                    <tr>
                                        <th>Account</th>
                                        <th style="text-align: right">Amount</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Total Received</td>
                                        <td style="text-align: right">{{$data->income}}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Payment</td>
                                        <td style="text-align: right">{{$data->expense}}</td>
                                    </tr>
                                    <tr>
                                        <td>Gross Profit / Loss (-)</td>
                                        <td style="text-align: right">{{$data->income - $data->expense}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
    
@endsection
