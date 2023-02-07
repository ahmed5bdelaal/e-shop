@extends('layouts.front')
@section('title')
  My Orders - E-Shop
@endsection
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order View</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <div class="border p-2">{{$order->fname}}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{$order->lname}}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{$order->email}}</div>
                                <label for="">Contact No.</label>
                                <div class="border p-2">{{$order->phone}}</div>
                                <label for="">Address</label>
                                <div class="border p-2">
                                    {{$order->address}}
                                    {{$order->city}}
                                    {{$order->state}}
                                    {{$order->country}}
                                </div>
                                <label for="">Post Code</label>
                                <div class="border p-2">{{$order->code}}</div>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderItems as $item)
                                            <tr>
                                                <td>{{$item->product->name}}</td>
                                                <td>{{$item->qty}}</td>
                                                <td>
                                                    <img src="{{asset('assets/uploads/product/'.$item->product->image[0])}}" width="50px" alt="">
                                                </td>
                                                <td>{{$item->price}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4>Grand total : {{$order->total}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection