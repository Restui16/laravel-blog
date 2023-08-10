@extends('back.layout.template')

@section('title', 'Dashboard | Admin')

@section('content')
    {{-- Content --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card text-bg-primary mb-3" style="max-width:100%;">
                    <div class="card-header">Total Article</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $total_article }}</h5>
                        <a href="{{ url('article') }}" class="text-white">View</a>
                    </div>

                </div>
            </div>
            <div class="col-6">
                <div class="card text-bg-secondary mb-3" style="max-width:100%;">
                    <div class="card-header">Total Category</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $total_category }}</h5>
                        <a href="{{ url('categories') }}" class="text-white">View</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <h3>Latest Article</h3>

                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $latest_article as $lts_article )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $lts_article->title }}</td>
                                <td>{{ $lts_article->category->name }}</td>
                                <td>{{ $lts_article->created_at }} </td>
                                <td class="text-center">
                                    <a href="{{ url('article/'. $lts_article->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <h3>Popular Article</h3>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Created_at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $popular_article as $pop_article )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pop_article->title }}</td>
                                <td>{{ $pop_article->category->name }}</td>
                                <td>{{ $pop_article->created_at }} </td>
                                <td class="text-center">
                                    <a href="{{ url('article/'. $pop_article->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
