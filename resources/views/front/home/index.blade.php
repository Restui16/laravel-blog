@extends('front.layouts.template')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div>Test Revisi</div>
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4 shadow-sm">
                    <a href="{{ url('p/' . $latest_post->slug) }}"><img class="card-img-top featured-img"
                            src="{{ asset('storage/back/' . $latest_post->img) }}" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            {{ $latest_post->created_at->format('d M Y') }}
                            <a href="{{ route('index_category', $latest_post->Category->id)}}" class="btn btn-outline-primary badge text-dark">{{ $latest_post->Category->name }}</a>
                        </div>
                        <h2 class="card-title">{{ $latest_post->title }}</h2>
                        <p class="card-text">{!! substr($latest_post->desc, 0, 250) . '...' !!}</p>
                        <a class="btn btn-primary" href="{{ url('p/' . $latest_post->slug) }}">Read more →</a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach ($articles as $article)
                        <div class="col-lg-6">
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
                    @endforeach

                    <div class="col-lg-6">
                    </div>
                </div>

                <!-- Pagination-->
                <div>
                    {{ $articles->links() }}
                </div>

            </div>
            @include('front.layouts.side-widget')
        </div>
    </div>
@endsection
