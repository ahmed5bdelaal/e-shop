@extends('layouts.admin')
@section('title')
    {{Auth::user()->name}} - Dashboard
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        @include('user.layouts.profile')
    </div>
</div>
@endsection