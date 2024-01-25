<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerSupplierFriend;

class SearchController extends Controller
{
    public function customerSearch(Request $request)
    {
        $data = CustomerSupplierFriend::select("name as value", "id")
        ->where(function ($query) use ($request){
            $query->where('name', 'LIKE', '%'. $request->get('search'). '%')
            ->orWhere('id',$request->get('search'))
            ->orWhere('phone', 'LIKE', '%'. $request->get('search'). '%')
            ->orWhere('email', 'LIKE', '%'. $request->get('search'). '%')
            ;
        })
        ->where('relation_type', 1)
        ->get(); 
    
        return response()->json($data);
    
    }
    public function supplierSearch(Request $request)
    {
        $data = CustomerSupplierFriend::select("name as value", "id")
        ->where(function ($query) use ($request){
            $query->where('name', 'LIKE', '%'. $request->get('search'). '%')
            ->orWhere('id',$request->get('search'))
            ->orWhere('phone', 'LIKE', '%'. $request->get('search'). '%')
            ->orWhere('email', 'LIKE', '%'. $request->get('search'). '%')
            ;
        })
        ->where('relation_type', 2)
        ->get(); 
    
        return response()->json($data);
    
    }
    public function friendSearch(Request $request)
    {
        $data = CustomerSupplierFriend::select("name as value", "id")
        ->where(function ($query) use ($request){
            $query->where('name', 'LIKE', '%'. $request->get('search'). '%')
            ->orWhere('id',$request->get('search'))
            ->orWhere('phone', 'LIKE', '%'. $request->get('search'). '%')
            ->orWhere('email', 'LIKE', '%'. $request->get('search'). '%')
            ;
        })
        ->where('relation_type', 3)
        ->get(); 
    
        return response()->json($data);
    
    }
}
