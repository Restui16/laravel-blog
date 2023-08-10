@extends('back.layout.template')

@section('title', 'List User | Admin')
@section('content')
    {{-- Content --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Users</h1>
        </div>

        <div class="mt-3">
            @if (auth()->user()->role == 1)
            <button class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalCreate">Create User    </button>
            @endif


            @if ($errors->any())
            <div class="my-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            @if (session('success'))
            <div class="my-3">
                <div class="alert alert-success">
                    {{ session('success')}}
                </div>
            </div>
            @endif

            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Function</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at}}</td>
                        <td>
                            <div class="text-center">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$user->id}}">Edit</button>
                                @if (auth()->user()->role == 1)
                                    @if ($user->id != auth()->user()->id)
                                        <a class="btn btn-danger btn-sm" onclick="deleteUser(this)" data-id="{{$user->id}}">Delete</a>
                                    @endif
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection

@include('back.user.create-modal')
@include('back.user.update-modal')

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteUser(e){
            let id = e.getAttribute('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "This user will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'Delete',
                            url: '/users/' + id,
                            dataType: "json",
                            success:function(response){
                                Swal.fire({
                                    title: 'Success Deleted',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonColor: '#3085d6',
                                }).then((result) => {
                                    window.location.href = '/users';
                                })
                            },
                            error: function(xhr, ajaxOptions, thrownError){
                                alert(xhr. status + "\n" + xhr.responseText + "\n" + thrownError);
                            }
                        });
                    }
                })
        }

    </script>
@endpush



