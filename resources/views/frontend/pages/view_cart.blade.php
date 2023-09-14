@extends('frontend.master')

@section('content')
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">View  Cart</h3>
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
    <section class=" section-9 pt-4">
        <div class="container">
            <div class="row">
              
                <div class="col-md-8">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <h2 class="bg-white">Cart Details</h3>
                    <div class="card-body table-responsive p-0">								
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead class="text-center">
                            <tr class="text-center">
                                <th class="text-center" style="width: 20%">Item</th>
                                <th class="text-center" style="width: 20%">Name </th>
                                <th class="text-center" style="width: 20%">Price</th>
                                <th class="text-center" style="width: 20%">Quantity</th>
                                <th class="text-center" style="width: 20%">Total</th>
                                <th class="text-center" style="width: 20%">Remove</th>
                            </tr>
                        </thead>
                        @php
                            $total=0;
                        @endphp
                        @foreach ($cartItems as $item)
                    
                        <tbody>
                            <tr class="text-center">
                                
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                         <img src="{{asset('/product/'.$item->product->image)}}" style="width: 100px; height:100px" >
                                    </div>
                                </td>
                                <td>{{$item->product->name}}</td>
                                <td>&#2547;{{$item->product->price}}</td>
                                <td>
                                    <form action="{{url('updateCart')}}" method="POST">
                                        @csrf
                                        <div class="col-md-2"></div>
                                        <div class="product_details_cart_option">
											<div class="quantity">
												
												<input type="number" name="quantity" class="form-control" min="1" value="{{$item->quantity}}" style="width: 60px; height: 40px;">
												
											</div>
                                            <br>
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <input type="submit" name="update" class="btn btn-success " value="Update"> 
										</div>
                                    </form>
                                    
                                </td>
                                <td>
                                    &#2547;{{ number_format($item->product->price * $item->quantity) }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger"><a href="{{url('/deletecart/'. $item->id)}}"><i class="fa fa-times"></i></a></button>
                                </td>
                            </tr>
                        </tbody>
                        @php
                            $total+=($item->product->price * $item->quantity);
                        @endphp
                        @endforeach
                    </table>										
                </div>
            </div>
                <div class="col-md-4">            
                    <div class="card cart-summery">
                        <div class="sub-title">
                            <h2 class="bg-white">Cart Summery</h3>
                        </div> 
                        <div class="card-body">
                            <div class="d-flex justify-content-between pb-2">
                                <h5>SUBTOTAL:  &#2547; {{$total}}</h5>
                            </div>
                            <div class="d-flex justify-content-between pb-2">
                                <h5>SHIPPING : FREE</h5>
                            </div>
                            <div class="d-flex justify-content-between summery-end">
                                <h5>TOTAL : &#2547;{{$total}}</h5>
                            </div>
                            <div class="pt-10">
                                <a class="btn-dark btn btn-block w-100">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>     
                    <div class="pt-10">
                        @php
							$customer_id = Session::get('id');
						@endphp
                        @if ($customer_id != Null)
							<a href="{{url('/checkout')}}"><button class="btn btn-danger btn-block w-100" type="button" id="button-addon2">
                                Checkout</button></a>
						@else
							<a href="{{url('/login_register')}}"><button class="btn btn-danger btn-block w-100" type="button" id="button-addon2">
                                Checkout</button></a>
						@endif


                    </div> 
                </div>
            </div>
        </div>
    </section>
</div>
    





@endsection