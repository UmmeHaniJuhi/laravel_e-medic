<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=
    ['id','pro_id','cus_id','quantity','price'];

    public function product(){
        return $this->belongsTo(Product::class, 'pro_id');
        
    }
    public function customer(){
        return $this->belongsTo(CustomerUser::class, 'cus_id');
        
    }
}
