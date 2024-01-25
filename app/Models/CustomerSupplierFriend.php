<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSupplierFriend extends Model
{
    use HasFactory;
    protected $fillable = ['relation_type','name','phone','email','address'];
    
    public function customerInfo(){
        return $this->hasMany(Income::class,'customer_supplier_friend_id','id');
    }
    public function SupplierInfo(){
        return $this->hasMany(Expense::class,'customer_supplier_friend_id','id');
    }
    public function FriendInfo(){
        return $this->hasMany(Loan::class,'customer_supplier_friend_id','id');
    }
    public function ReceivableInfo()
    {
        return $this->hasOne(Loan::class,'customer_supplier_friend_id','id')
        ->whereMonth('date', date('m'))
        ->selectRaw('sum(amount) as totalReceivableAmount')
        ->where('payment_type', 2)
        ->groupBy('customer_supplier_friend_id');
    }

    public function PaidInfo()
    {
        return $this->hasOne(Loan::class,'customer_supplier_friend_id','id')
        ->whereMonth('date', date('m'))
        ->selectRaw('sum(amount) as totalPaidAmount')
        ->where('payment_type', 1)
        ->groupBy('customer_supplier_friend_id');
    }
}
				