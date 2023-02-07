@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{url('add-coupon')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Coupon</a>
            <h1>Coupons<sup>({{$coupons->count()}})</sup></h1>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Coupon Code</th>
                        <th>Type</th>
                        <th>Value</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>S.N.</th>
                        <th>Coupon Code</th>
                        <th>Type</th>
                        <th>Value</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </tfoot>
                <tbody>
                    <div style="display: none">{{$num=1}}</div>
                    @foreach($coupons as $coupon)   
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$coupon->code}}</td>
                        <td>
                            @if($coupon->type=='fixed')
                                <span class="badge badge-primary">{{$coupon->type}}</span>
                            @else
                                <span class="badge badge-warning">{{$coupon->type}}</span>
                            @endif
                        </td>
                        <td>
                            @if($coupon->type=='fixed')
                                ${{number_format($coupon->value,2)}}
                            @else
                                {{$coupon->value}}%
                            @endif</td>
                        <td>
                            @if($coupon->status=='active')
                                <span class="badge badge-success">{{$coupon->status}}</span>
                            @else
                                <span class="badge badge-warning">{{$coupon->status}}</span>
                            @endif
                        </td>
                        <td>
                            <form method="POST" action="{{url('destroy-coupon/'.$coupon->id)}}">
                              @csrf 
                                  <button class="btn btn-danger btn-sm show_confirm"  data-id={{$coupon->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>  
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('.show_confirm').click(function(event){
            var form = $(this).closest('form');
            var name = $(this).data('name');
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((willDelete)=>{
                if(willDelete){
                    form.submit();
                }
            })
        })
    </script>
@endsection