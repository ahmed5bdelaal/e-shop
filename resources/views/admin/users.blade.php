@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Users<sup>({{$users->count()}})</sup></h1>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>num</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            @if(Auth::user()->photo)
                                <img src="{{ asset('assets/images/users/'.$user->photo) }}" alt="{{ $user->name }}" width="32" height="32" class="rounded-circle">
                            @else
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                            @endif
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->role_as == 1 ? 'admin' : 'user'}}</td>
                        <td>
                            @if ($user->role_as !== 1)
                                <form action="{{url('make-admin/'.$user->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="POST">
                                    <button type="submit" class="btn btn-primary show_confirmM" >Make Admin</button>
                                </form>
                                <form action="{{url('remove-user/'.$user->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="POST">
                                    <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title="Delete" >Delete</button>
                                </form>
                            @endif                               
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
    <script type="text/javascript">
        $('.show_confirmM').click(function(event){
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
                confirmButtonText: 'Yes, Make Admin'
            })
            .then((willDelete)=>{
                if(willDelete){
                    form.submit();
                }
            })
        })
    </script>
@endsection