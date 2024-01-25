<?php

namespace App\Http\Controllers;

use App\Models\CustomerSupplierFriend;
use App\Models\Income;
use App\Models\Expense;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CustomerSupplierFriendController extends Controller
{
    public function customer(Request $request)
    {
        $perPage = $request->has('plimit')?$request->input('plimit'):20;
        $name = $request->name;
        $relation =1;

        $data = CustomerSupplierFriend::orderby('name')
        ->when($name, function($q) use($name){
            return $q->where('name','like',"%{$name}%");
        }) 
        ->where('relation_type', $relation)
        ->paginate($perPage);
        $data->relation = $relation;

        return view('crm.customerSupplierFriendList',compact('data'));
    }

    public function supplier(Request $request)
    {
        $perPage = $request->has('plimit')?$request->input('plimit'):20;
        $name = $request->name;
        $relation =2;

        $data = CustomerSupplierFriend::orderby('name')
        ->when($name, function($q) use($name){
            return $q->where('name','like',"%{$name}%");
        }) 
        ->where('relation_type', $relation)
        ->paginate($perPage);
        $data->relation = $relation;

        return view('crm.customerSupplierFriendList',compact('data'));
    }
    public function friend(Request $request)
    {
        $perPage = $request->has('plimit')?$request->input('plimit'):20;
        $name = $request->name;
        $relation = 3;

        $data = CustomerSupplierFriend::orderby('name')
        ->when($name, function($q) use($name){
            return $q->where('name','like',"%{$name}%");
        }) 
        ->where('relation_type', $relation)
        ->paginate($perPage);
        $data->relation = $relation;

        return view('crm.customerSupplierFriendList',compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required',],
            'phone' => ['required',],
            'email' => 'required|email|unique:customer_supplier_friends,email',
        ]);
        
        $data = new CustomerSupplierFriend;
        $data->fill($request->all());
        $data->save();

        $request->session()->flash('success', 'Add Successfully!');
        return redirect()->back();
    }

    public function show(CustomerSupplierFriend $customerSupplierFriend, $id)
    {
      $data = CustomerSupplierFriend::findOrFail($id);
      return view('reports.transaction', compact('data'));
    }

    public function loanReports(CustomerSupplierFriend $customerSupplierFriend, $id)
    {
      $data = CustomerSupplierFriend::findOrFail($id);
      return view('reports.loanReport', compact('data'));
    }

    public function profitLoss(Request $request)
    {
        // return  Carbon::now();
        if(empty($request->date1)){
            $request->date1 = Carbon::now()->startOfMonth()->toDateString();
            $request->date2 = Carbon::now()->toDateString();
        } elseif(intval($request->date1)>0 && empty($request->date2)){
            $request->date2 = Carbon::now()->toDateString();
        }

        $data = new CustomerSupplierFriend();
        $data->expense = Expense::whereBetween('date',[$request->date1,$request->date2])->sum('amount');
        $data->income = Income::whereBetween('date',[$request->date1,$request->date2])->sum('amount');
        // return $data;
        

        return view('reports.profitLoss',compact('data'));
    }

    public function edit(CustomerSupplierFriend $customerSupplierFriend)
    {
        //
    }

    public function update(Request $request, CustomerSupplierFriend $customerSupplierFriend, $id)
    {
        $request->validate([
            'name' => ['required',],
            'phone' => ['required',],
            'email' => ['required',],
        ]);

        $data = CustomerSupplierFriend::findOrFail($id);
        $data->fill($request->all());
        $data->save();

        $request->session()->flash('success', 'Information Updated Successfully...');
        return redirect()->back();
    }

    public function destroy(CustomerSupplierFriend $customerSupplierFriend)
    {
        //
    }
}
