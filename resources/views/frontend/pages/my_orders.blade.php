@extends('frontend.master')

@section('content')

<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Order History</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="{{url('/index')}}">Home</a></li>
                    <li class="active">Order History</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<section >
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-1 col-md-1 mx-auto"></div>
                <div class="col-lg-10 col-md-10 mx-auto">
                    <div class="title text-center">
                        <h2 >My Order History</h2>
                    </div>
                    <br>
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Total Bill</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Order Date</th>
                                <th>View Products</th>
    
                            </tr>
                        </thead>
                        <tbody >
                            @php
                                $i=0;
                               
                            @endphp
                            @foreach ($orders as $item)
                            @php
                                $i++;
                            @endphp
                           
                            <tr >
                                <td>{{$i}}</td>
                                <td>{{$item->total}}</td>
                                <td>{{$item->shipping->name}}</td>
                                <td>{{$item->shipping->address}}</td>
                                <td>{{$item->shipping->mobile}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{\Carbon\Carbon::parse($item->created_at)->format('M d ,Y  h:iA')}}</td>
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Product
                                  </button>
                                  
                                  <!-- The Modal -->
                                  <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                  
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                          <h4 class="modal-title">All Products</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                  
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Product Image</th>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders_details as $orderDetail)
                                                        <tr>
                                                            <td><img src="{{ asset('/product/'.$orderDetail->product->image) }}" style="height: 100px; width: 100px;" alt=""></td>
                                                            <td>{{ $orderDetail->product_name }}</td>
                                                            <td>{{ $orderDetail->product_sales_quantity }}</td>
                                                            <td>{{ $orderDetail->product_price }}</td>
                                                            <td>{{ $orderDetail->product_price * $orderDetail->product_sales_quantity }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                  
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                  
                                      </div>
                                    </div>
                                  </div></td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    
    
                </div>
                <div class="col-lg-1 col-md-1 mx-auto"></div>
              
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
</section>


@endsection