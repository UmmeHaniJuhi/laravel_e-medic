<?php

namespace App\Http\Controllers;
use App\Models\CustomerUser;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerUserController extends Controller
{
    public function customer_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $cus = CustomerUser::where('email', $request->input('email'))->first();

        if ($cus && Hash::check($request->input('password'), $cus->password)) {
        
        Session::put('id', $cus->id);

        return redirect()->route('checkout')->withSuccess('Login successful.');
      }
        else{
            return Redirect::to('/login_check');
        }
            
    }
    public function customer_registration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customer_users',
            'password' => 'required|min:6|confirmed', 
            'mobile' => ['required', 'regex:/^(?:\+?88)?01[3-9]\d{8}$/'],
        ]);
        
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password'] = Hash::make($request->password);
        $data['mobile']=$request->mobile;
        
        $id=CustomerUser::insertGetId($data);
        Session::put('id',$id);
        Session::put('name',$request->name);

        return Redirect::to('/checkout');
    }

    public function showLoginRegisterForm()
    {
        return view('frontend.login_register');
    }
    public function showRegistrationForm()
    {
        return view('frontend.register');
    }
    public function cus_logout()

    {
        $cus_id = Session::get('id');
        Cart::where('cus_id', $cus_id)->delete();

        Session::flush();

        return redirect()->route('frontend.home')->withSuccess('You have been logged out.');
    }


}
