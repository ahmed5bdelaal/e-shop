@extends('layouts.admin')
@section('content')
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" style="float: right" href="{{ url('/downloadPDF/'.$order->id) }}">Export to PDF</a>
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
                            @if($order->status != 'cancel')
                            <form action="{{url('update-order/'.$order->id)}}" method="post">
                                @csrf
                            <label for="">Order Status</label><br>
                            <select id="status" onchange="val()" class="form-select" name="order_status" aria-label="Default select example">
                                <option {{$order->status == 'new' ? 'selected':''}} value="new">New</option>
                                <option {{$order->status == 'process' ? 'selected':''}} value="process">Process</option>
                                <option {{$order->status == 'delivered' ? 'selected':''}} value="delivered">Delivered</option>
                                <option {{$order->status == 'cancel' ? 'selected':''}} value="cancel">Cancel</option>
                            </select>
                            <button type="submit" class="btn btn-primary" >change status</button>
                            <br>
                            <br>
                            <input id="of" class="ofer border p-2" type="text" name="message" placeholder="what the reason for that">
                            </form>
                            @else
                                <button type="" class="btn btn-primary" >Order Canceled</button>
                            @endif
                            @if($order->message)
                            <label for="">Message</label>
                            <div class="border p-2">{{$order->message}}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>            
@endsection
@section('scripts')
    <script>
    function val() {
        d = document.getElementById("status").value;
        if(d == "cancel") {
            document.getElementById('of').classList.remove('ofer');
        }else{
            document.getElementById('of').classList.add('ofer');
        }
    }
    </script>
@endsection