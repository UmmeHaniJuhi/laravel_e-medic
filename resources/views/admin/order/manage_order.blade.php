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
                <h4><strong>Manage Order</strong></h4>
            </div>
            
            <div class="card-body table-responsive p-0">								
                <table class="table table-bordered table-hover text-nowrap">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 10%">Order ID</th>
                            <th style="width: 10%">Customer Name</th>
                            <th style="width: 10%">Order Total</th>
                            <th style="width: 10%">Order Date & Time</th>
                            <th style="width: 15%">Status</th>
                            <th style="width: 20%">Action</th>
                        </tr>
                    </thead>
                    @foreach ($orders as $order )
                    <tbody>
                        <tr class="text-center">
                           
                                
                           <td>{{$order->id}}</td>
                           <td>{{$order->customer->name}}</td>
                           <td>{{$order->total}}</td>
                           <td>{{\Carbon\Carbon::parse($order->created_at)->format('M d,Y,h:iA')}}</td>
                            
                            <td>
                                <span class="btn btn-success">Active</span>
                                
                                <span class="btn btn-danger">Deactive</span>
                               
                            </td>
                            <td>
                                
                                <div class="btn-group">
                                       
                                    <a href="" class="btn btn-danger mr-2">
                                        <i class="fas fa-thumbs-down"></i>  
                                    </a>
                           
                                  
                                    <a href="" class="btn btn-success mr-2">
                                        <i class="fas fa-thumbs-up"></i>  
                                    </a>

                                    
                                
                                    <a class="btn btn-info mr-2" href="{{url('/view_order/'.$order->id)}}">
                                        <i class="fas fa-edit"></i>  
                                    </a>
                                    <form action="" method="POST">
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
