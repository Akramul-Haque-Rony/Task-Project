@extends('layouts.adminTheme')
@section('title', 'Expense List')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Expense List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="?">Expense List</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('expense.create') }}"><u>Add New</u></a>
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
                                <label for="">Name</label>
                                <input type="text" class="form-control form-control-sm" name="name" placeholder="Enter name..."
                                    value="{{ request()->input('name') }}">
                            </div>
                        </div>
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
                                    value="{{ request()->input('date2') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Amount</label>
                                <input type="number" step="any" class="form-control form-control-sm" name="amount1" placeholder="amount "
                                    value="{{ request()->input('amount1') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">to Amount</label>
                                <input type="number" step="any" class="form-control form-control-sm" name="amount2" placeholder="amount"
                                    value="{{ request()->input('amount2') }}">
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
                        {{-- <div class="col-md-6"></div> --}}
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">

                            <table class="table table-hover  table-striped">
                                <thead>
                                    <tr>
                                        <th>Supplier Name</th>
                                        <th>Payment Date</th>
                                        <th>Paid Amount</th>
                                        <th>Notes</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data->count() > 0)
                                    @php $total = 0 @endphp
                                        @foreach ($data as $key => $datas)
                                            <tr>
                                                <td>{{ @$datas->SupplierInfo->name }}</td>
                                                <td> {{ date('d-M, Y', strtotime(@$datas->date)) }}</td>
                                                <td>{{ number_format(@$datas->amount, 2) }}</td>
                                                <td>{{ Str::of(@$datas->note)->limit(30) }}</td>
                                                <td>
                                                    <a href="#"
                                                        class="btn btn-xs btn-primary edit_unit_button"
                                                        data-toggle="modal"data-target="#modal-BrandEdit-{{$key}}">
                                                        <i class="fas fa-edit"></i> Edit </a>
                                                </td>
                                                @php $total += @$datas->amount @endphp
                                            </tr>
                                            {{-- Edit Modal Start --}}
                                            <div class="modal fade" id="modal-BrandEdit-{{$key}}">
                                                <form role="form" method="POST" action="{{ route('expense.update', ['id' => $datas->id]) }}">
                                                    @csrf
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit {{ @$datas->SupplierInfo->name}}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                    
                                                                <div class="row">                                                                    
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group">
                                                                            <label>Amount</label>
                                                                            <input type="number" step="any" class="form-control form-control-sm" name="amount"
                                                                                value="{{ $datas->amount }}" placeholder="Enter ..." required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="form-group">
                                                                            <label>date</label>
                                                                            <input type="date" class="form-control form-control-sm" name="date"
                                                                                value="{{ $datas->date }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Note</label>
                                                                            <textarea class="form-control form-control-sm" placeholder="Enter ..." name="note">{{ $datas->note }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            {{-- End Of Edit Modal --}}
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td colspan="3" class="float-right">
                                                Total
                                            </td>
                                            <td>{{ number_format($total,2)}}</td>
                                            <td colspan="2"></td>
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
