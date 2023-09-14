@extends('frontend.master')

@section('content')

<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Checkout</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="{{url('/index')}}">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            
            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Shipping address</h3>
                    </div>
                    <form action="{{url('/save_shipping_address')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input class="input" type="text" name="name" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="country" placeholder="Country">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="zip_code" placeholder="ZIP Code">
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="mobile" placeholder="Mobile No">
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="primary-btn order-submit" style="float: right;">Next</button>
                        </div>
                        
                    </form>
                    
                    
                </div>
                <!-- /Billing Details -->

            </div>
            <div class="col-md-5">
                <img src="{{asset('admin-assets/img/shipping.png')}}"  style="max-width: 100%; height: auto;" alt="">
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection