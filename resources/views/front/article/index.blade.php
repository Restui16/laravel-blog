@extends('front.layouts.template')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <form action="{{ route('articles_search') }}" method="post" class="mb-3">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Search Articles ..." />
                    <button class="btn btn-primary" id="button-search" type="Submit">Go!</button>
                </div>
            </form>

            @if ($keyword)
            <div>
                <span class="text-muted">Showing Article With Keyword : <b class="text-dark"> {{$keyword}} </b></span>
                <span><a href="{{ route('index_articles')}}" class="btn btn-secondary btn-sm"> Reset </a></span>
            </div>
            @endif
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
