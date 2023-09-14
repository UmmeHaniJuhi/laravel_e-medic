<!-- HEADER -->
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
				<div id="top-header">
					<div class="container">
						<ul class="header-links pull-right">
							
							@php
								$customer_id = Session::get('id');
							@endphp
							@if ($customer_id != Null)
							<li><a href="{{ url('/my_orders') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>My Orders </a></li>
							@else
							<li><a href=><i class="fa fa-shopping-cart" aria-hidden="true"></i>Order Now</a></li>
							@endif

							@if ($customer_id != Null)
								<li><a href="{{ url('/cus_logout') }}"><i class="fa fa-user-o"></i> Logout</a></li>
							@else
								<li><a href="{{ url('/login_check') }}"><i class="fa fa-user-o"></i> Login</a></li>
							@endif
						</ul>
					</div>
					
			</div>
			
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="{{url('/index')}}" class="logo">
									<img src="{{asset('front-assets/img/logo.png')}}" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">All Categories</option>
                                        @foreach ($categories as $category )
                                        <option>{{$category->name}}</option>
                                        @endforeach	
									</select>
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">{{ count($carts) }}</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											@php
											$total=0;
										@endphp
										@foreach ($carts as $item)
											<div class="product-widget">
												<div class="product-img">
													<img src="{{asset('/product/'.$item->product->image)}}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">{{$item->product->name}}</a></h3>
													<h4 class="product-price"><span class="qty">{{$item->quantity}}</span>&#2547;{{$item->product->price}}</h4>
												</div>
												<button class="delete"><a href="{{url('/deletecart/'.  $item->id)}}"><i class="fa fa-close"></i></a></button>
											</div>
											@php
                            				$total+=($item->product->price * $item->quantity);
                    					    @endphp

											@endforeach
										</div>
										<div class="cart-summary">
											<small>{{ count($carts) }} Item(s) selected</small>
											<h5>SUBTOTAL:&#2547; {{$total}}</h5>
										</div>
										@php
											$customer_id = Session::get('id');
										@endphp
										<div class="cart-btns">
											<a href="{{url('/view_cart')}}">View Cart</a>
											@if ($customer_id != Null)
											<a href="{{url('/checkout')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
											@else
											<a href="{{url('/login_register')}}">Checkout<i class="fa fa-arrow-circle-right"></i></a>
											@endif
											
											
										</div>
									</div>
								</div>
								<!-- /Cart -->
								
								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

<!-- /HEADER -->
<script>
    // Add this JavaScript code to handle the AJAX request for deleting cart items
    $(document).ready(function() {
        $(".delete-cart-item").on("click", function() {
            var itemId = $(this).data("item-id");
            $.ajax({
                type: "POST",
                url: "{{ url('/deletecart/') }}" + "/" + itemId,
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Update the cart item count and total in the dropdown
                    $("#cart-item-count").text(response.cartCount);
                    $("#cart-item-count-summary").text(response.cartCount + " Item(s) selected");
                    $("#cart-total").text(response.cartTotal);
                }
            });
        });
    });
</script>