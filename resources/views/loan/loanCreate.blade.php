@extends('layouts.adminTheme')
@section('title', 'Add Loan')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Loan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('loan.index') }}">Loan List</a></li>
                        <li class="breadcrumb-item"><a href="?"><u>Add New</u></a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('loan.store') }}" role="form" id=""
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Search Friend</label>
                                            <input class="form-control form-control-sm" id="search" name=""
                                                type="text" placeholder="Customer id/Name/phone/email"
                                                value="{{ @app('request')->input('refid') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Friends Name</label>
                                            <h5 class="id">
                                                {{ @app('request')->input('refname') }}
                                            </h5>
                                            <div style="display: none">
                                                <input class="form-control" id="id"
                                                    name="customer_supplier_friend_id" type="text" required
                                                    value="{{ @app('request')->input('refid') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="number" step="any" class="form-control form-control-sm"
                                                name="amount" value="{{ old('amount') }}" placeholder="Enter ..." required>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control form-control-sm" name="date"
                                                value="{{ old('date') }}" required>
                                        </div>
                                    </div>
                                    {{-- </div>
                                <div class="row"> --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Payment Tpe</label>
                                            <select name="payment_type" class="form-control form-control-sm" required>
                                                <option value="">Select One</option>
                                                {!! PayType(old('payment_type')) !!}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Note</label>
                                            <textarea class="form-control form-control-sm" placeholder="Enter ..." name="note" value="{{ old('note') }}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="" align="right">
                                    <button type="submit" class="float-right btn btn-success"> Save </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        var path = "{{ route('friendSearch') }}";

        $("#search").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: path,
                    type: 'GET',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            select: function(event, ui) {
                $('.id').text(ui.item.label);
                $('#search,#id').val(ui.item.id);
                console.log(ui.item);
                return false;
            }
        });
    </script>

@endsection
