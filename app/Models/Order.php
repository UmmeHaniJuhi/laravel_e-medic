<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=
    ['id','cus_id','ship_id','total','status'];

    public function customer(){
        return $this->belongsTo(CustomerUser::class, 'cus_id');
        
    }
    public function shipping(){
        return $this->belongsTo(Shipping::class, 'ship_id');
        
    }
    public function cart(){
        return $this->belongsTo(Cart::class, 'cart_id');
        
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }
}
