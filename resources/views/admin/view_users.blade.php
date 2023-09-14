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
                <h4><strong>View Users</strong></h4>
            </div>
            
            <div class="card-body table-responsive p-0">								
                <table class="table table-bordered table-hover text-nowrap">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 10%">User ID</th>
                            <th style="width: 10%">Name Name</th>
                            <th style="width: 10%">User Type</th>
                            <th style="width: 10%">Email</th>
                            <th style="width: 10%">Mobile</th>
                            
                        </tr>
                    </thead>
                    @foreach ($users as $user )
                    <tbody>
                        <tr class="text-center">    
                           <td>{{$user->id}}</td>
                           <td>{{$user->name}}</td>
                           <td>Customer</td>
                           <td>{{$user->email}}</td>
                           <td>{{$user->mobile}}</td>
                          
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
