@extends('frontend.master')

@section('content')

<div class="section">
    <div class="center-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <img src="{{asset('admin-assets/img/Login.jpg')}}"  style="max-width: 100%; height: auto;" alt="">
                    </div>
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3> Register</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ url('/customer_registration') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" required />
                                </div>

                                <!-- Email input -->
                                <div class="form-group">
                                    <label for="email">{{ __('Email address') }}</label>
                                    <input type="email" class="form-control" id="email" name="email" required />
                                </div>

                                <div class="form-group">
                                    <label for="mobile">{{ __('Mobile Number') }}</label>
                                    <input type="number" class="form-control" id="mobile" name="mobile" required />
                                </div>

                                <!-- Password input -->
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input type="password" class="form-control" id="password" name="password" required />
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required />
                                </div>

                                <!-- Sign-in button -->
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary btn-block">{{ __('Register Now') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <p class="text-center">Already have an account? <a href="{{url('/login_register')}}">Sign in</a></p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

 
