<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->has('plimit')?$request->input('plimit'):20;
        $name = $request->name;

        $data = Loan::latest('id')
        ->when($name, function($q) use($name){
            return $q->where('name','like',"%{$name}%");
        })
        ->when($name,function ($query) use ($name) {
            $query->whereHas('csfInfo', function($query) use ($name){
                    return  $query->where('name','like', "%{$name}%");
                });
        })
        ->when($name,function ($query) use ($name) {
            $query->whereHas('SupplierInfo', function($query) use ($name){
                    return  $query->where('name','like', "%{$name}%");
                });
        })
        ->paginate($perPage);

        return view('loan.loanList',compact('data'));
    }

    public function create()
    {
        return view('loan.loanCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_supplier_friend_id' => ['required',],
            'amount' => ['required',],
            'date' => ['required',],
            'payment_type' => ['required',],
        ]);
        
        $data = new Loan;
        $data->fill($request->all());
        $data->save();

        $request->session()->flash('success', 'Add Successfully!');
        return redirect()->back();
    }

    public function update(Request $request, Loan $loan, $id)
    {
       
        $request->validate([
            'amount' => ['required',],
            'date' => ['required',],
            'payment_type' => ['required',],
        ]);
        
        $data = Loan::findOrFail($id);
        $data->fill($request->all());
        $data->save();

        $request->session()->flash('success', 'Information Updated Successfully...');
        return redirect()->back();
    }

    public function destroy(Loan $loan)
    {
        //
    }
}
