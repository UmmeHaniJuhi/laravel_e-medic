@extends('frontend.master')

@section('content')
<div class="section">
    <div class="center-content">
        <div class="container">
            <div class="row">
                    <div class="row justify-content-center">
                        <div class="col-md-6 mx-auto">
                            <div class="card">
                                <img src="{{asset('admin-assets/img/Login.jpg')}}"  style="max-width: 100%; height: auto;" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 mx-auto">
                            <div class=" card">
                                <div class="card-header text-center">
                                   <h3> Login Or Register</h3>
                                </div>
                
                                <div class="card-body">
                                    <form method="POST" action="{{ url('/customer_login') }}">
                                        @csrf
                
                                        <!-- Email input -->
                                        <div class="form-group">
                                            <label for="email">{{ __('Email address') }}</label>
                                            <input type="email" class="form-control" id="email" name="email" required />
                                        </div>
                
                                        <!-- Password input -->
                                        <div class="form-group">
                                            <label for="password">{{ __('Password') }}</label>
                                            <input type="password" class="form-control" id="password" name="password" required />
                                        </div>
                
                                        <!-- Checkbox and Forgot Password link -->
                                        <div class="form-row align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="remember" name="remember" checked />
                                                <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
                                            </div>
                                            <br>
                                            <a href="#">{{ __('Forgot password?') }}</a>
                                        </div>
                
                                        <!-- Sign-in button -->
                                        <div class="form-group mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">{{ __('Login Now') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                
                            <div class="text-center mt-3">
                                <p>{{ __("Not a member?") }} <a href="{{url('/registration')}}">Register</a>
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>
 
 
@endsection