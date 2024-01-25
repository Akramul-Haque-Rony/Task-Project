<?php

namespace App\Http\Controllers;

use App\Models\CustomerSupplierFriend;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Loan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        $start = Carbon::now()->startOfMonth()->toDateString();
        $end = Carbon::now()->toDateString();

        $data = new CustomerSupplierFriend();
        $data->expense = Expense::whereBetween('date',[$start,$end])->sum('amount');
        $data->income = Income::whereBetween('date',[$start,$end])->sum('amount');

        $data->loanGiven = Loan::whereBetween('date',[$start,$end])->where('payment_type', 1)->sum('amount');
        $data->loanPaymentBack = Loan::whereBetween('date',[$start,$end])->where('payment_type', 2)->sum('amount');
        // $data->loanPaymentBack = Loan::whereBetween('date',[$start,$end])->where('payment_type', 2)->sum('amount');


        return view('dashboard',compact('data'));
    }
}
