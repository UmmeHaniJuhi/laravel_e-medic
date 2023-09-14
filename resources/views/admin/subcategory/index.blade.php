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
                            <th style="width: 10%">SubCategory ID</th>
                            <th style="width: 20%">SubCategory Name</th>
                            <th style="width: 20%">Category Name</th>
                            <th style="width: 15%">Slug</th>
                            <th style="width: 15%">Status</th>
                            <th style="width: 20%">Action</th>
                        </tr>
                    </thead>
                    @foreach($subcategories as $subcategory) 
                    <tbody>
                        <tr class="text-center">
                            
                            <td>{{$subcategory->id}}</td>
                            <td>{{$subcategory->name}}</td>
                            <td>{{$subcategory->category->name}}</td>
                            <td>{{$subcategory->slug}}</td>
                            <td>
                                @if ($subcategory->status==1)
                                <span class="btn btn-success">Active</span>
                                @else
                                <span class="btn btn-danger">Deactive</span>
                                @endif
                            </td>
                            <td>
                                
                                <div class="btn-group">
                                        @if ($subcategory->status==1)
                                    <a href="{{url('/subcat-status'.$subcategory->id)}}" class="btn btn-danger mr-2">
                                        <i class="fas fa-thumbs-down"></i>  
                                    </a>
                            
                                    @else
                                    <a href="{{url('/subcat-status'.$subcategory->id)}}" class="btn btn-success mr-2">
                                        <i class="fas fa-thumbs-up"></i>  
                                    </a>

                                        @endif
                                
                                    <a class="btn btn-info mr-2" href="{{url('/sub-categories/'.$subcategory->id.'/edit' )}}">
                                        <i class="fas fa-edit"></i>  
                                    </a>
                                    <form action="{{url('/sub-categories/'.$subcategory->id)}}" method="POST">
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