@extends('layouts.app')

@section('content')
<div class="main-signup-header">
    <h2>Welcome back!</h2>
    <h6 class="font-weight-semibold mb-4">Please sign in to continue.</h6>
    <div class="panel panel-primary">
        <div class="panel-body tabs-menu-body border-0 p-0">
            <div class="tab-content">
                <div class="tab-pane active" id="tab5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label> 
                            <input class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" type="text" name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label> 
                            <input class="form-control  @error('password') is-invalid @enderror" placeholder="Enter your password" type="password" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-block">Sign In</button>
                    </form>
                </div>
                <div class="tab-pane" id="tab6">
                    <div id="mobile-num" class="wrap-input100 validate-input input-group mb-2">
                        <a href="javascript:void(0);" class="input-group-text bg-white text-muted">
                            <span>+91</span>
                        </a>
                        <input class="input100 form-control" type="mobile" placeholder="Mobile">
                    </div>
                    <div id="login-otp" class="justify-content-around mb-4">
                        <input class="form-control  text-center me-2" id="txt1" maxlength="1" onkeyup="move(event, '', 'txt1', 'txt2')">
                        <input class="form-control  text-center me-2" id="txt2" maxlength="1" onkeyup="move(event, 'txt1', 'txt2', 'txt3')">
                        <input class="form-control  text-center me-2" id="txt3" maxlength="1" onkeyup="move(event, 'txt2', 'txt3', 'txt4')">
                        <input class="form-control  text-center" id="txt4" maxlength="1" onkeyup="move(event, 'txt3', 'txt4', '')">
                    </div>
                    <span>Note : Login with registered mobile number to generate OTP.</span>
                    <div class="container-login100-form-btn mt-3">
                        <a href="javascript:void(0);" class="btn login100-form-btn btn-primary" id="generate-otp">
                            Proceed
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-signin-footer text-center mt-3">
        <p><a href="" class="mb-3">Forgot password?</a></p>
    </div>
</div>
@endsection
