<?php
namespace App\Http\Controllers;

use App\Models\CustomerUser;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Shipping;
use App\Models\Cart;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Foreach_;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $customer_id=CustomerUser::where('id', Session::get('id'))->first();
        return view('frontend.pages.checkout', compact('customer_id'));
    }
    public function login_check(){
        return view('frontend.login_register');
    }

    public function save_shipping_address(Request $request)
    {
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['city']=$request->city;
        $data['country']=$request->country;
        $data['zip_code']=$request->zip_code;
        $data['mobile']=$request->mobile;

        $s_id=Shipping::insertGetId($data);
        Session::put('s_id',$s_id);
        

        return redirect('/payment');
    }
    public function payment()
    {
        return view('frontend.pages.payment');
    }

    public function order_place(Request $request)
    {
        $order_data=array();
        $order_data['cus_id']=Session::get('id');
        $order_data['ship_id']=Session::get('s_id');
        $order_data['total']= Session::get('total');
        $order_data['status']='pending';
        
        $order_id = Order::insertGetId($order_data);

        $carts = Cart::where('id', Session::get('id'))->get();

        $oD_data=array();
        foreach ($carts as $cart_content) {
            $product = Product::find($request->input('id'));
           
            $oD_data['order_id']=$order_id;
            $oD_data['product_id']=$cart_content->id;
            $oD_data['product_name']= $product->name;
            $oD_data['product_price']=$product->price;
            $oD_data['product_sales_quantity']= $cart_content->quantity;
                
            DB::table('order_details')->insert($oD_data);
               
            }
        
      return view('frontend.pages.order_done');
    }

    public function my_orders()
    {
        $orders=Order::where('id', Session::get('id'))->get();
        $orders_details=Order::where('order_id', Session::get('id'))->get();
        

        return view('frontend.pages.my_orders',compact('orders','orders_details'));
    }

   
}
