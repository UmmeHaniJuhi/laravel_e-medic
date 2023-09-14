@extends('admin.admin_layouts.app')

@section('content')

@if (session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        {{ session()->get('message') }}
    </div>
@endif

<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
    
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">								
                <table class="table table-bordered table-hover text-nowrap">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 3%">Code</th>
                            <th style="width: 10%">Product Name</th>
                            <th style="width: 12%">Price</th>
                            <th style="width: 12%">Category ID</th>
                            <th style="width: 10%">SubCategory Name</th>
                            <th style="width: 10%">Brand Name</th>
                            <th style="width: 20%">Image</th>
                            <th style="width: 10%">Status</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    @foreach($products as $product) 
                    <tbody>
                        <tr class="text-center">
                            
                            <td>{{$product->code}}</td>
                            <td>{{$product->name}}</td>
                            <td>&#2547;{{$product->price}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->subcategory->name}}</td>
                            <td>{{$product->brand->name}}</td>
                            <td>
                                <img src="/product/{{$product->image}}" style="width: 100px" alt="">
                            </td>
                            <td>
                                @if ($product->status==1)
                                <span class="btn btn-success">Active</span>
                                @else
                                <span class="btn btn-danger">Deactive</span>
                                @endif
                            </td>
                            <td>
                                
                                <div class="btn-group">
                                        @if ($product->status==1)
                                    <a href="{{url('/product-status'.$product->id)}}" class="btn btn-danger mr-2">
                                        <i class="fas fa-thumbs-down"></i>  
                                    </a>
                            
                                    @else
                                    <a href="{{url('/product-status'.$product->id)}}" class="btn btn-success mr-2">
                                        <i class="fas fa-thumbs-up"></i>  
                                    </a>

                                        @endif
                                
                                    <a class="btn btn-info mr-2" href="{{url('/products/'.$product->id.'/edit' )}}">
                                        <i class="fas fa-edit"></i>  
                                    </a>
                                    <form action="{{url('/products/'.$product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <button class="btn btn-warning mr-2" type="submit">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            
                                        </a>
                                    </form>
                                </div>
                            
                            </td>
                        </tr>
                       
                        
                    </tbody>
                    @endforeach
                </table>										
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>

@endsection