@extends('layouts.front')
@section('title')
Login - E-Shop
@endsection
@section('content')
<div class="breadcrumbs">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6 col-12">
<div class="breadcrumbs-content">
<h1 class="page-title">Login</h1>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<ul class="breadcrumb-nav">
<li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
<li>Login</li>
</ul>
</div>
</div>
</div>
</div>


<div class="account-login section">
<div class="container">
<div class="row">
<div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
<form class="card login-form" action="{{ route('login') }}" method="post">
    @csrf
<div class="card-body">
<div class="title">
<h3>Login Now</h3>
<p>You can login using your social media account or email address.</p>
</div>
<div class="social-login">
<div class="row">
<div class="col-lg-4 col-md-4 col-12"><a class="btn facebook-btn" href="{{ url('login/facebook') }}"><i class="lni lni-facebook-filled"></i> Facebook
login</a></div>
<div class="col-lg-4 col-md-4 col-12"><a class="btn twitter-btn" href="{{ url('login/github') }}"><i class="lni lni-github-original"></i> Github
login</a></div>
<div class="col-lg-4 col-md-4 col-12"><a class="btn google-btn" href="{{ url('login/google') }}"><i class="lni lni-google"></i> Google login</a>
</div>
</div>
</div>
<div class="alt-option">
<span>Or</span>
</div>
<div class="form-group input-group">
<label for="reg-fn">{{ __('Email Address') }}</label>
<input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" id="reg-email" required autocomplete="email" autofocus>
@error('email')
    <span class="invalid-feedback" role="alert">
     <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group input-group">
<label for="reg-fn">{{ __('Password') }}</label>
<input class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" type="password" id="reg-pass" required>
@error('password')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
</div>
<div class="d-flex flex-wrap justify-content-between bottom-content">
<div class="form-check">
<input type="checkbox" class="form-check-input width-auto" name="remember" {{ old('remember') ? 'checked' : '' }} id="exampleCheck1">
<label class="form-check-label">{{ __('Remember Me') }}</label>
</div>
@if (Route::has('password.request'))
    <a class="blost-pass" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
@endif
</div>
<div class="button">
<button class="btn" type="submit">{{ __('Login') }}</button>
</div>
<p class="outer-link">Don't have an account? <a href="/register">Register here </a>
</p>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection