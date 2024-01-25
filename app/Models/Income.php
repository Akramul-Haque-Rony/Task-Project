<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $fillable = ['customer_supplier_friend_id','amount','date','note'];

    public function CustomerInfo(){
        return $this->hasOne(CustomerSupplierFriend::class,'id','customer_supplier_friend_id');
    }
}
				