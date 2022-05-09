@extends('layouts.app')

@section('content')
<div class="main-signup-header">
    <h2>Forget Password!</h2>
    <h6 class="font-weight-semibold mb-4">Please enter your email</h6>
    <div class="panel panel-primary">
        <div class="panel-body tabs-menu-body border-0 p-0">
            <div class="tab-content">
                <div class="tab-pane active" id="tab5">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label> 
                            <input class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" type="text" name="email" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <button class="btn btn-primary btn-block">Send Reset Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection