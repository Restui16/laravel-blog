@extends('back.layout.template')

@section('title', 'List Category | Admin')
@section('content')
    {{-- Content --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Categories</h1>
        </div>

        <div class="mt-3">
            <button class="btn btn-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#modalCreate">Create</button>

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
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Function</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->created_at}}</td>
                        <td>
                            <div class="text-center">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$category->id}}">Edit</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete{{$category->id}}">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- modal create --}}
        @include('back.categories.create-modal')

        {{-- modal update --}}
        @include('back.categories.update-modal')

        {{-- modal delete --}}
        @include('back.categories.delete-modal')
    </main>
@endsection



