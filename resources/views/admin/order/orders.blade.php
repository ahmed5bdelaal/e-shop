@extends('layouts.admin')
@section('content')
            <div class="card">
                <div class="card-header">
                    <h1>New Orders</h1>
                    <a href="{{url('order-history')}}">Orders History</a>
                    <a style="float: right" href="{{url('order-canceled')}}">Orders Canceled</a>
                    <hr>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{$item->tracking_no}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <a href="admin/view-order/{{$item->id}}" class="btn btn-primary" >view</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>            
@endsection