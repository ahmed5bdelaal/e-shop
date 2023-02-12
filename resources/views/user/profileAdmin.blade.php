@extends('layouts.admin')
@section('title')
    {{Auth::user()->name}} - Dashboard
@endsection
@section('content')
<div class="card">
    <h5 class="card-header">Profile</h5>
    <div class="card-body">
        @include('user.layouts.profile')
    </div>
</div>
@endsection