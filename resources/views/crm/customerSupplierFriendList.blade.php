@extends('layouts.adminTheme')
@section('title')
    {!! RelationType($data->relation, 1) !!} List
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{!! RelationType($data->relation, 1) !!} List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <button type="button" class="btn btn-success swalDefaultSuccess">
                            Launch Success Toast
                        </button> --}}
                        <button type="button" class="float-right btn btn btn-primary" data-toggle="modal"
                            data-target="#modal-MemberAdd"><i class="fa fa-plus"></i> Add</button>
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
                                <input type="text" class="form-control form-control-sm" name="name"
                                    placeholder="enter name..." value="{{ request()->input('name') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="number" class="form-control form-control-sm" name="phone"
                                    placeholder="ex. +88017..." value="{{ request()->input('phone') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control form-control-sm" name="email"
                                    placeholder="ex.abc@gmail.com" value="{{ request()->input('email') }}">
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
                        <div class="col-md-4"></div>
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
                                        <th>{!! RelationType($data->relation, 1) !!} Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data->count() > 0)
                                        @foreach ($data as $key => $datas)
                                            <tr>
                                                <td>{{ @$datas->name }}</td>
                                                <td>{{ @$datas->phone }}</td>
                                                <td>{{ @$datas->email }}</td>
                                                <td>{{ @$datas->address }}</td>

                                                <td>
                                                    @if ($data->relation == 3)
                                                        <a href="{{ route('reports.loan', $datas->id) }}"
                                                            class="btn btn-xs btn-success edit_unit_button">
                                                            <i class="fas fa-eye"></i> view </a>
                                                    @else
                                                        <a href="{{ route('transaction.view', $datas->id) }}"
                                                            class="btn btn-xs btn-success edit_unit_button">
                                                            {{-- data-toggle="modal"data-target="#modal-BrandEdit" --}}
                                                            <i class="fas fa-eye"></i> view </a>
                                                    @endif
                                                    <a href="#"
                                                        class="btn btn-xs btn-primary edit_unit_button"
                                                        data-toggle="modal"data-target="#modal-BrandEdit-{{$key}}">
                                                        <i class="fas fa-edit"></i> Edit </a>
                                                </td>
                                            </tr>
                                            {{-- Edit Modal Start --}}
                                            <div class="modal fade" id="modal-BrandEdit-{{$key}}">
                                                <form role="form" method="POST" action="{{ route('csf.update', ['id' => $datas->id]) }}">
                                                    @csrf
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit A {!! RelationType($data->relation, 1) !!}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                    
                                                                <div class="row">
                                                                    <input type="hidden" name="relation_type" value="{{ $data->relation }}">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>{!! RelationType($data->relation, 1) !!} Name*</label>
                                                                            <input type="text" class="form-control form-control-sm" name="name"
                                                                                value="{{ $datas->name }}" placeholder="Enter ..." required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <label>Contact*</label>
                                                                            <input type="number" class="form-control form-control-sm" name="phone"
                                                                                value="{{ $datas->phone }}" placeholder="+880" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <div class="form-group">
                                                                            <label>Email*</label>
                                                                            <input type="email" class="form-control form-control-sm" name="email"
                                                                                value="{{ $datas->email }}" placeholder="enter nid" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label>Address</label>
                                                                            <textarea class="form-control form-control-sm" placeholder="Enter ..." name="address">{{$datas->address}}</textarea>
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
        {{-- Add Start model --}}
        <div class="modal fade" id="modal-MemberAdd">
            <form role="form" method="POST" action="{{ route('csf.store') }}">
                @csrf
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add A {!! RelationType($data->relation, 1) !!}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <input type="hidden" name="relation_type" value="{{ $data->relation }}">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>{!! RelationType($data->relation, 1) !!} Name*</label>
                                        <input type="text" class="form-control form-control-sm" name="name"
                                            value="{{ old('name') }}" placeholder="Enter ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Contact*</label>
                                        <input type="number" class="form-control form-control-sm" name="phone"
                                            value="{{ old('phone') }}" placeholder="+880" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" class="form-control form-control-sm" name="email"
                                            value="{{ old('email') }}" placeholder="enter nid" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control form-control-sm" placeholder="Enter ..." name="address" value="{{ old('address') }}"></textarea>
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
        {{-- Add model end --}}
    </section>
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            $('.swalDefaultSuccess').click(function() {
                Toast.fire({
                    icon: 'success',
                    title: 'Add Successfully.'
                })
            });
        });
    </script>
@endsection
