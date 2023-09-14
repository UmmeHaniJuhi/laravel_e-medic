<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
   
    public function updateCart(Request $request)
    {
        $item=Cart::find($request->input('id'));
        $item->quantity=$request->input('quantity');
        
        $item->save();

        return redirect()->back()->with('message','Items Quantity Sucessfully '); 
    }
    public function addTOCart(Request $request)
    {   
        $item=new Cart();
        $item->quantity=$request->input('quantity');
        $item->pro_id=$request->input('id');
        $item->cus_id=$request->input('id');
        $item->save();
        session(['c_id' => $item->id]);

        return redirect()->back()->with('message','Product added Sucessfully '); 

    }


    public function view_cart()
    {

       $cartItems=Cart::all();

        return view('frontend.pages.view_cart', compact('cartItems'));
    }


    public function deletecart($id)
    {
        $item=Cart::find($id);
        $item->delete();
            return redirect()->back()->with('message','Item has been Deleted Successfully');
          
    }
    public function clearCart()
    {
        Session::flush(); 
        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully.');
    }
    
}
        
        
    


