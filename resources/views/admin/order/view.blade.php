@extends('layouts.admin')
@section('content')
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" style="float: right" href="{{ url('/downloadPDF/'.$order->id) }}">Export to PDF</a>
                    <a class="btn btn-success" style="float: right" href="{{ url('/send-email/'.$order->id) }}">Send email to {{$order->fname}}</a>
                    <h1>Order</h1>
                    <hr>
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
                            <form action="{{url('update-order/'.$order->id)}}" method="post">
                                @csrf
                            <label for="">Order Status</label><br>
                            <select class="form-select" name="order_status" aria-label="Default select example">
                                <option {{$order->status == '0' ? 'selected':''}} value="0">Pending</option>
                                <option {{$order->status == '1' ? 'selected':''}} value="1">completed</option>
                            </select>
                            <button type="submit" class="btn btn-primary" >change status</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
@endsection