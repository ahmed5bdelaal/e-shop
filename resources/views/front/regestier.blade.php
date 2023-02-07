@extends('layouts.front')
@section('title')
Register - E-Shop
@endsection
@section('content')
<div class="breadcrumbs">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6 col-12">
<div class="breadcrumbs-content">
<h1 class="page-title">{{ __('Register') }}</h1>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<ul class="breadcrumb-nav">
<li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
<li>{{ __('Register') }}</li>
</ul>
</div>
</div>
</div>
</div>


<div class="account-login section">
<div class="container">
<div class="row">
<div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
<div class="register-form">
<div class="title">
<h3>No Account? Register</h3>
<p>Registration takes less than a minute but gives you full control over your orders.</p>
</div>
<form class="row" action="{{ route('register') }}" method="post">
    @csrf
<div class="col-sm-6">
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<label for="reg-fn">Name</label>
@if(!empty($name))
<input class="form-control" type="text" id="reg-fn" name="name" value="{{$name}}" autofocus required>
@else
<input class="form-control" type="text" id="reg-fn" name="name" value="{{ old('name') }}" autofocus required>
@endif 
@if ($errors->has('name'))
<span class="help-block">
    <strong>{{ $errors->first('name') }}</strong>
</span>
@endif
</div>
</div>
<div class="col-sm-6">
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<label for="reg-email">E-mail Address</label>
@if(!empty($email))
<input class="form-control" type="email" name="email" value="{{$email}}" id="reg-email" required>
@else
<input class="form-control" type="email" id="reg-email" name="email" value="{{ old('email') }}" required>
@endif
@if ($errors->has('email'))
    <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
@endif
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="reg-pass">{{ __('Password') }}</label>
<input class="form-control @error('password') is-invalid @enderror" type="password" id="reg-pass" name="password" autocomplete="new-password" required>
@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="reg-pass-confirm">{{ __('Confirm Password') }}</label>
<input class="form-control" type="password" id="reg-pass-confirm" name="password_confirmation" autocomplete="new-password" required>
</div>
</div>
<div class="button">
<button class="btn" type="submit">{{ __('Register') }}</button>
</div>
<p class="outer-link">Already have an account? <a href="/login">Login Now</a>
</p>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection