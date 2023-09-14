@extends('frontend.master')

@section('content')
@if (session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        {{ session()->get('message') }}
    </div>
@endif

<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="{{url('/index')}}">Home</a></li>
                    <li class="active">Order Placed</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<div class="col-md-3"></div>
    <div class="col-md-6">
    <div class="alert alert-success" role="alert" style="margin-top: 100px;margin-bottom: 50px;">
        <h3 class="alert-heading" style="text-align: center;">Well Done!</h3>
        <h4 style="text-align: center;">You have successfully placed order</h4>

        <hr>
        <p class="mb-0" style="text-align: center;">We will contact you soon.</p>
    </div>
    </div>
<div class="col-md-3"></div>

@endsection