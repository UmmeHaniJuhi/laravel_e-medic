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
                <h1>Edit Brand</h1>
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
        <form action="{{url('/brands/'.$brand->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input value="{{$brand->name}}" type="text" name="name" id="name" class="form-control" placeholder="Name">	
                            </div>
                        </div>								
                    </div>
                </div>							
            </div>
            
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update Brand</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->



@endsection