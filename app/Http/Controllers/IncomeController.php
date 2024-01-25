<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{

    public function index(Request $request)
    {
        $perPage = $request->has('plimit')?$request->input('plimit'):20;
        $name = $request->name;
        if(intval($request->date1)>0 && empty($request->date2)){
            $request->date2 = $request->date1;
        }
        if(intval($request->amount1)>0 && empty($request->amount2)){
            $request->amount2 = $request->amount1;
        }

        $data = Income::latest('id')
        ->when($name,function ($query) use ($name) {
            $query->whereHas('CustomerInfo', function($query) use ($name){
                return  $query->where('name','like', "%{$name}%");
            });
        })
        ->when($request->amount1, function($q) use($request){
            return $q->whereBetween('amount',[$request->amount1,$request->amount2]);
        })
        ->when($request->date1, function($q) use($request){
            return $q->whereBetween('date',[$request->date1,$request->date2]);
        })
        ->paginate($perPage);
        
        return view('income.incomeList',compact('data'));
    }

    public function create()
    {
        return view('income.incomeCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_supplier_friend_id' => ['required',],
            'amount' => ['required',],
            'date' => ['required',],
        ]);
        
        $data = new Income;
        $data->fill($request->all());
        $data->save();

        $request->session()->flash('success', 'Add Successfully!');
        return redirect()->back();
    }

    public function update(Request $request, Income $income, $id)
    {
        $request->validate([
            'amount' => ['required',],
            'date' => ['required',],
        ]);
        
        $data = Income::findOrFail($id);
        $data->fill($request->all());
        $data->save();

        $request->session()->flash('success', 'Information Updated Successfully...');
        return redirect()->back();
    }

    public function destroy(Income $income)
    {
        //
    }
}
