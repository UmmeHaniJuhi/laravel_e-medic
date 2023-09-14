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
        <form action="{{url('/sub-categories/'.$subCategory->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">SubCategory Name</label>
                                <input value="{{$subCategory->name}}" type="text" name="name" id="name" class="form-control" placeholder="Name">	
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug">Slug</label>
                                <input value="{{$subCategory->slug}}" type="text" name="slug" id="slug" class="form-control" placeholder="Slug">	
                            </div>
                        </div>	
                        <div class="control-group">
                            <label class="control-label" for="">Select Category</label>
                            <div class="control">
                                <select name="category">
                                    <option value="{{$subCategory->category->id}}">{{$subCategory->category->name}}</option>
                                    
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>								
                    </div>
                </div>							
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update SubCategory</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->



@endsection