@extends('admin.admin_layouts.app')

@section('content')
    
<!-- Content Header (Page header) -->
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
                <h1>Create Product</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{url('/')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="{{url('/products/')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Product Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="">	
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="code">Product Code</label>
                                <input type="text" name="code" id="code" class="form-control" placeholder="Code" required="">	
                            </div>
                        </div>	
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="price">Product Price</label>
                                <input type="number" name="price" id="price" class="form-control" placeholder="Price" required="">	
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="control-group">
                                    <label class="control-label" for="">Select Category</label>
                                    <div class="control">
                                        <select style="width: 500px; height: 36px;" name="category">
                                            <option>Select Category</option>
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
                                    <option>Select Brand</option>
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
                                            <option>Select SubCategory</option>
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
                                <label >Category Image Here :</label>
                                <input type="file" name="image" class="form-control" >
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label >Category Description</label>
                                <div>
                                    <textarea name="description" id="description" cols="56" rows="3"></textarea>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>							
            </div>
            
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
    
@endsection
