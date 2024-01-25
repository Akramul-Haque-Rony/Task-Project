@extends('layouts.adminTheme')
@section('title', 'Dashboard')
@section('content')
<br>
<section class="content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background: #ffae00">
                    <div class="inner">
                        <h3>{{ date('M Y') }}</h3>
                        <p>This Month Calculation</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ number_format(@$data->income, 2) }}</h3>
                        <p>Income(From Customer)</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check"></i>
                    </div>
                    <a href="{{route('income.index')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ number_format(@$data->expense, 2) }}</h3>
                        <p>Expense(To Supplier)</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-check"></i>
                    </div>
                    <a href="{{route('expense.index')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background-color: rgb(245, 147, 147)">
                    <div class="inner">
                        <h3>{{ number_format(@$data->income - @$data->expense, 2) }}</h3>

                        <p>Profit/Loss</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('report.profitLoss')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>            
        </div>
        <div class="row" style="text-align: center">
            {{-- <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format(@$khalabillTotal, 2) }}</h3>
                        <p>Khala Bill Received</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar-sign"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div> --}}
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background-color: #90ee90">
                    <div class="inner">
                        <h3 style="">{{ number_format($data->loanGiven), 2 }}</h3>
                        <p>Total Loan Paid</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-chevron-right"></i>
                    </div>
                    <a href="#" class="small-box-footer" style="color: black">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box" style="background-color: #90ee90">
                    <div class="inner">
                        <h3>- {{ number_format($data->loanPaymentBack), 2 }}</h3>
                        <p>Total Payment Received</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-chevron-left"></i>
                    </div>
                    <a href="#" class="small-box-footer" style="color: black">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ number_format($data->loanGiven - $data->loanPaymentBack, 2) }}</h3>
                        <p>Receivable Loan return</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar-sign"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info<i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
