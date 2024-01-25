@extends('layouts.adminTheme')
@section('title')
    {{ @$data->name }}
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ @$data->name }} All Transection</h1>
                </div>
                {{-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button type="button" class="btn btn-success swalDefaultSuccess">
                            Launch Success Toast
                        </button>
                        <button type="button" class="float-right btn btn btn-primary" data-toggle="modal"
                            data-target="#modal-MemberAdd"><i class="fa fa-plus"></i> Add</button>
                        </li>
                    </ol>
                </div> --}}
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
    {{-- <div class="card">
        <div class="card-body">
            <div class="col-md-12">
                <form action="">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Rec. Date</label>
                                <input type="date" class="form-control form-control-sm" name="date1" placeholder=""
                                    value="{{ request()->input('date1') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">to Date</label>
                                <input type="date" class="form-control form-control-sm" name="date2" placeholder=""
                                    value="{{ request()->input('date2') }}">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="">limit</label>
                                <select name="plimit" class="form-control form-control-sm">
                                    {!! pageLimit($perpage) !!}
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
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
    </div> --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">

                            <table class="table table-hover  table-striped">
                                <thead>
                                    <tr>
                                        <th>Payment Date</th>
                                        <th>Paid Amount</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data->count() > 0)
                                        @php $total = 0 @endphp
                                        @if ($data->relation_type == 1)
                                            @foreach ($data->customerInfo as $key => $datas)
                                                <tr>
                                                    <td> {{ date('d-M, Y', strtotime(@$datas->date)) }}</td>
                                                <td>{{ number_format(  @$datas->amount, 2) }}</td>
                                                <td>{{ Str::of(@$datas->note)->limit(30) }}</td>
                                                @php $total += @$datas->amount @endphp
                                                </tr>

                                            @endforeach
                                        @else
                                            @foreach ($data->SupplierInfo as $key => $datas)
                                                <tr>
                                                    <td> {{ date('d-M, Y', strtotime(@$datas->date)) }}</td>
                                                <td>{{ number_format(@$datas->amount, 2) }}</td>
                                                <td>{{ Str::of(@$datas->note)->limit(30) }}</td>
                                                @php $total += @$datas->amount @endphp
                                                </tr>
                                            @endforeach
                                        @endif
                                        <tr>
                                            <td class="float-right"> Total: </td>
                                            <td>{{number_format($total, 2)}}</td>
                                            <td></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="14">
                                                <h5 class="text-center">No Information Found</h5>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
