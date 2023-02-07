@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{url('add-category')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add Category"><i class="fas fa-plus"></i> Add Category</a>
            <h1>Categorys<sup>({{$categorys->count()}})</sup></h1>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>num</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorys as $cat)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->disc}}</td>
                        <td>
                            <img src="{{asset('assets/uploads/category/'.$cat->image)}}" width="100" alt="{{$cat->name}}">
                        </td>
                        <td>
                            <a href="{{url('edit-category/'.$cat->id)}}" class="btn btn-primary" >Edit</a>
                            <form action="{{url('remove-category/'.$cat->id)}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="POST">
                                <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title="Delete" >Delete</button>
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