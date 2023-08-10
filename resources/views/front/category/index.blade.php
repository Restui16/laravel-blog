@extends('front.layouts.template')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <h1 class="text-center mb-3     ">Category : {{$category_id->name}}</h1>
            <!-- Blog entries-->
            @forelse ($articles as $article)
            <div class="col-lg-4">
                <!-- Blog post-->
                <div class="card mb-4 shadow-sm">
                    <a href="{{ url('p/' . $article->slug) }}"><img class="card-img-top post-img"
                            src="{{ asset('storage/back/' . $article->img) }}" alt="..." /></a>
                    <div class="card-body card-height">
                        <div class="small text-muted">
                            {{ $article->created_at->format('d M Y') }}
                            <a href="{{ route('index_category', $article->Category->id)}}" class="btn btn-outline-primary text-dark badge">{{ $article->Category->name }}</a>
                        </div>
                        <h2 class="card-title h4">{{ $article->title }}</h2>
                        <p class="card-text">{!! substr($article->desc, 0, 150) . '...' !!}</p>
                        <a class="btn btn-primary" href="{{ url('p/' . $article->slug) }}">Read more →</a>
                    </div>
                </div>
            </div>
            @empty

            <h1 class="fw-bold text-center">Not Found</h1>
        @endforelse
        </div>
        <!-- Pagination-->
        <div>
            {{ $articles->links() }}
        </div>
    </div>
@endsection
