@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <h2>Howdy</h2>
    <h6 class="font-weight-semibold mb-4">Please enter your new password</h6>
    <input type="hidden" name="token" value="{{ $token }}">
    <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
    <div class="form-group">
        <label>Password</label> 
        <input class="form-control  @error('password') is-invalid @enderror" placeholder="Enter your password" type="password" name="password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Confirm Password</label> 
        <input class="form-control  @error('password') is-invalid @enderror" placeholder="Confirm your password" type="password" name="password_confirmation">
    </div>
    <button class="btn btn-primary btn-block">Sign In</button>
</form>
@endsection
