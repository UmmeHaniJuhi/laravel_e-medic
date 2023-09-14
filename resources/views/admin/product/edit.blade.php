@extends('admin.admin_layouts.app')

@section('content')

@if (session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        {{ session()->get('message') }}
    </div>
@endif

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit SubCategory</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{url('/')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="{{url('/products/'. $product->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Product Name</label>
                                <input value="{{$product->name}}" type="text" name="name" id="name" class="form-control" placeholder="Name">	
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="code">Product Code</label>
                                <input value="{{$product->code}}" type="text" name="code" id="code" class="form-control" placeholder="Code">	
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="price">Product Price</label>
                                <input value="{{$product->price}}" type="text" name="price" id="price" class="form-control" placeholder="Price">	
                            </div>
                        </div>	
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="control-group">
                                    <label class="control-label" for="">Select Category</label>
                                    <div class="control">
                                        <select style="width: 500px; height: 36px;" name="category">
                                            <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                                            
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>	
                             </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="control-group">
                                    <label class="control-label" for="">Select Brand</label>
                                    <div class="control">
                                        <select style="width: 500px; height: 36px;" name="brand">
                                            <option value="{{$product->brand->id}}">{{$product->brand->name}}</option>
                                            
                                            @foreach ($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">	
                                <div class="control-group">
                                    <label class="control-label" for="">Select SubCategory</label>
                                    <div class="control">
                                        <select style="width: 500px; height: 36px;" name="subcategory">
                                            <option value="{{$product->subcategory->id}}">{{$product->subcategory->name}}</option>
                                            
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>	
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label >Product Image Here :</label>
                                <input type="file" name="image" class="form-control" >
                            </div>
                        </div>	
                    
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label >Category Description</label>
                                <div>
                                    <textarea value="{{$product->description}}" name="description" id="description" cols="56" rows="3">{{$product->description}}</textarea>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                        
                </div>
                						
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->



@endsection