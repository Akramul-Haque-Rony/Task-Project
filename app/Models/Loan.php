<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = ['customer_supplier_friend_id','payment_type','amount','date','note'];

    public function FriendInfo(){
        return $this->hasOne(CustomerSupplierFriend::class,'id','customer_supplier_friend_id');
    }
}
