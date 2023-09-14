<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel Shop :: Administrative Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('admin-assets/css/adminlte.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin-assets/css/custom.css')}}">
	</head>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Right navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
					  	<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>					
				</ul>
				<div class="navbar-nav pl-2">
					<!-- <ol class="breadcrumb p-0 m-0 bg-white">
						<li class="breadcrumb-item active">Dashboard</li>
					</ol> -->
				</div>
				
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
							<img src="{{asset('admin-assets/img/avatar5.png')}}" class='img-circle elevation-2' width="40" height="40" alt="">
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
							<h4 class="h4 mb-0"><strong>{{ Auth::user()->name }}</strong></h4>
                            <div class="mb-3">{{ Auth::user()->email }}</div>
                            
							<div class="dropdown-divider"></div>

							<x-dropdown-link :href="route('profile.edit')" class="dropdown-item text-primary">
                              <i class="fas fa-user-cog mr-2"></i> {{ __('Profile') }}
                            </x-dropdown-link>
							<div class="dropdown-divider"></div>
						
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
        
                                <x-dropdown-link :href="route('logout')"  class="dropdown-item text-danger"
                                        onclick="event.preventDefault();
                                               this.closest('form').submit();">
                                       <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Log Out') }}
                                    </x-dropdown-link>
                            </form>							
                            					
						</div>
					</li>
				</ul>
			</nav>
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="#" class="brand-link">
					<img src="{{asset('admin-assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light">LARAVEL SHOP</span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user (optional) -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							<!-- Add icons to the links using the .nav-icon class
								with font-awesome or any other icon font library -->
							<li class="nav-item">
								<a href="{{url('/')}}" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>Dashboard</p>
								</a>																
							</li>
							<li class="nav-item menu-items">
								<a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="auth">
								  <span class="menu-icon">
									<i class="nav-icon fas fa-file-alt"></i>
								  </span>
								  <span class="menu-title">Catrgory</span>
								  <i class="menu-arrow"></i>
								</a>
								<div class="collapse ml-3" id="category">
								  <ul class="nav flex-column sub-menu">
									<li class="nav-item"> 
										<a class="nav-link" href="{{url('/categories/create')}}">
											<span class="menu-icon mr-1">
												<i class="fa fa-plus-circle" aria-hidden="true"></i>
											</span>
											<span class="menu-title">Add Catrgory</span>
										</a>
									<li class="nav-item"> 
										<a class="nav-link" href="{{url('/categories')}}">
											<span class="menu-icon mr-1">
												<i class="fa fa-desktop" aria-hidden="true"></i>
											</span>
											<span class="menu-title">All Catrgory</span>
										</a>
									</li>
								  </ul>
								</div>
							</li>
							<li class="nav-item menu-items">
								<a class="nav-link" data-toggle="collapse" href="#subcategory" aria-expanded="false" aria-controls="auth">
								  <span class="menu-icon">
									<i class="nav-icon fa fa-list-ul"></i>
								  </span>
								  <span class="menu-title">Sub Catrgory</span>
								  <i class="menu-arrow"></i>
								</a>
								<div class="collapse ml-3" id="subcategory">
								  <ul class="nav flex-column sub-menu">
									<li class="nav-item"> 
										<a class="nav-link" href="{{url('/sub-categories/create')}}">
										<span class="menu-icon mr-1">
											<i class="fa fa-plus-circle" aria-hidden="true"></i>
										</span>
										<span class="menu-title">Add Sub Catrgory</span>
										</a>
									</li>
									<li class="nav-item"> 
										<a class="nav-link" href="{{url('/sub-categories')}}">
											<span class="menu-icon mr-1">
												<i class="fa fa-desktop" aria-hidden="true"></i>
											</span>
											<span class="menu-title">All Sub Catrgory</span>
										</a>
									</li>
									 </ul>
								</div>
							</li>
							<li class="nav-item menu-items">
								<a class="nav-link" data-toggle="collapse" href="#brand" aria-expanded="false" aria-controls="auth">
								  <span class="menu-icon">
									<svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
									</svg>
								  </span>
								  <span class="menu-title">Brands</span>
								  <i class="menu-arrow"></i>
								</a>
								<div class="collapse ml-3" id="brand">
								  <ul class="nav flex-column sub-menu">
									<li class="nav-item"> 
										<a class="nav-link" href="{{url('/brands/create')}}">
										<span class="menu-icon mr-1">
											<i class="fa fa-plus-circle" aria-hidden="true"></i>
										</span>
										<span class="menu-title">Add Brand</span>
										</a>
									</li>
									<li class="nav-item"> 
										<a class="nav-link" href="{{url('/brands')}}">
											<span class="menu-icon mr-1">
												<i class="fa fa-desktop" aria-hidden="true"></i>
											</span>
											<span class="menu-title">All Brands</span>
										</a>
									</li>
									 </ul>
								</div>
							</li>
							
							<li class="nav-item menu-items">
								<a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="auth">
								  <span class="menu-icon">
									<i class="nav-icon fas fa-tag"></i>
								  </span>
								  <span class="menu-title">Products</span>
								  <i class="menu-arrow"></i>
								</a>
								<div class="collapse ml-3" id="product">
								  <ul class="nav flex-column sub-menu">
									<li class="nav-item"> 
										<a class="nav-link" href="{{url('/products/create')}}">
										<span class="menu-icon mr-1">
											<i class="fa fa-plus-circle" aria-hidden="true"></i>
										</span>
										<span class="menu-title">Add Product</span>
										</a>
									</li>
									<li class="nav-item"> 
										<a class="nav-link" href="{{url('/products')}}">
											<span class="menu-icon mr-1">
												<i class="fa fa-desktop" aria-hidden="true"></i>
											</span>
											<span class="menu-title">All Products</span>
										</a>
									</li>
									 </ul>
								</div>
							</li>
							
							
							
							<li class="nav-item">
								<a href="#" class="nav-link">
									<!-- <i class="nav-icon fas fa-tag"></i> -->
									<i class="fas fa-truck nav-icon"></i>
									<p>Shipping</p>
								</a>
							</li>							
							<li class="nav-item">
								<a href="{{url('/manage_order')}}" class="nav-link">
									<i class="nav-icon fas fa-shopping-bag"></i>
									<p>Orders</p>
								</a>
							</li>
							
							<li class="nav-item">
								<a href="{{'/manage_user'}}" class="nav-link">
									<i class="nav-icon  fas fa-users"></i>
									<p>Users</p>
								</a>
							</li>
														
						</ul>
					</nav>
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
         	</aside>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				@yield('content')
			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				
				<strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
			</footer>
			
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{asset('admin-assets/js/adminlte.min.js')}}"></script>
		<!-- AdminLTE for demo purposes -->
		<!-- <script src="js/demo.js"></script>-->

        @yield('customJs')
	</body>
</html>