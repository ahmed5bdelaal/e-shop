@extends('layouts.front')
@section('title')
  My Orders
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
                                                    <img src="{{asset('assets/uploads/product/'.$item->product->name($item->product->id))}}" width="50px" alt="">
                                                </td>
                                                <td>{{$item->price}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4>Grand total : {{$order->total}}</h4>
                                <label for="">Order Status</label><br>
                                <form id="form" action="{{url('cancelOrder/'.$order->id)}}" method="post">
                                    @csrf
                                    @if($order->status != 'cancel')
                                        @if ($order->status != 'delivered')
                                                <input type="hidden" name="order_status" value="cancel">
                                                <button type="" class="btn btn-primary show_confirm" >Cancel Order</button>
                                        @else
                                            <button type="" class="btn btn-primary" >Order Delivered</button>
                                        @endif
                                    @else
                                        <button type="" class="btn btn-primary" >Order Canceled</button>
                                        @if($order->message)
                                            <label for="">Message</label>
                                            <div class="border p-2">{{$order->message}}</div>
                                        @endif
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('javascript')
<script type="text/javascript">
    $('.show_confirm').click(function(event){
        var form = $(this).closest('form');
        var name = $(this).data('name');
        event.preventDefault();
        swal.fire({
            title: "what the reason for that",
            text: "Write something interesting:",
            input: 'text',
            showCancelButton: true,
            closeOnConfirm: false,
            inputPlaceholder: "what the reason for that"
        }).then((result) => {
            if (result.value) {
                document.getElementById("form").innerHTML += '<input type="hidden" name="message" value="'+result.value+'">';
                form.submit();
            }
        });
    })
</script>
@endpush