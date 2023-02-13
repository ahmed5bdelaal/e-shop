@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
          <a href="{{url('add-product')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add Product"><i class="fas fa-plus"></i> Add Product</a>
            <h1>Products</h1>
            <hr>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="table_id">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>orginal price</th>
                            <th>selling price</th>
                            <th>quantity</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection
@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('.show_confirm').click(function(event){
            var form = $(this).closest('#form');
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
    })
    </script>
    <script>
        $(function () {
          var table =$('#table_id').DataTable({
            processing:true,
            serverSide:true,
            dom:'Bfrtip',
            order:[
              [0,"desc"]
            ],
            
            ajax:"{{Route('products.all')}}",
            columns: [{
              data:'id',
              name:'id'
            },
            {
              data:'category',
              name:'category'
            },
            {
              data:'name',
              name:'name'
            },
            {
              data:'s_disc',
              name:'s_disc'
            },
            {
              data:'o_price',
              name:'o_price'
            },
            {
              data:'s_price',
              name:'s_price'
            },
            {
              data:'qty',
              name:'qty'
            },
            {
              data:'image',
              name:'image'
            },
            {
              data:'action',
              name:'action'
            }
            ]
          })
        })
      </script>
@endsection