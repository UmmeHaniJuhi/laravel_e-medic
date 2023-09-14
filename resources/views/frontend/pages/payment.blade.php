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
                    <li class="active">Payment</li>
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
            <div class="col-md-3"></div>
            <!-- Order Details -->
            <div class="col-md-6 order-details" style="margin-top: 40px; margin-bottom:40px">
                <div class="section-title text-center">
                    <h3 class="title">Your Order</h3>
                </div>
                @php
                $total=0;
                 @endphp
                <div class="order-summary">
                    <div class="order-col">
                        <div><strong>PRODUCT</strong></div>
                        <div><strong>TOTAL</strong></div>
                    </div>
                    @foreach ($carts as $item)
                        <div class="order-products">
                            <div class="order-col">
                                <div>{{$item->quantity}} x {{$item->product->name}}</div>
                                <div>&#2547;{{ number_format($item->product->price * $item->quantity) }}</div>
                            </div>
                            
                        </div>
                        @php
                                $itemTotal = $item->product->price * $item->quantity; 
                                $total += $itemTotal; 
                            @endphp
                        @endforeach

                        @php
                            Session::put('total', $total); 
                        @endphp

                    
                    <div class="order-col">
                        <div>Shiping</div>
                        <div><strong>FREE</strong></div>
                    </div>
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div><strong class="order-total"> &#2547;{{$total}}</strong></div>
                    </div>
                </div>
                <form action="{{url('/order_place')}}" method="POST">
                    @csrf
                <div class="payment-method">
                    <div class="input-radio">
                        <input type="radio" class="active" name="payment" id="payment" checked>
                        <label for="payment-1">
                            <span></span>
                            Payment is Cash on Delivery
                        </label>
                    </div>
                </div>
                <div class="input-checkbox">
                    <input type="checkbox" id="terms">
                    <label for="terms">
                        <span></span>
                        I've read and accept the <a href="#">terms & conditions</a>
                    </label>
                </div>
                <button type="submit" class="primary-btn order-submit btn-block w-100" >Place order</button>
                </form>
            </div>
            <!-- /Order Details -->
            <div class="col-md-3"></div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection