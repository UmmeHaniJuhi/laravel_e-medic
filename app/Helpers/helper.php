<?php
use App\Models\Cart;
function cartArray()
{
    $cartCollection = Cart::getContent();
    return $cartCollection->toArray(); 
}

    
