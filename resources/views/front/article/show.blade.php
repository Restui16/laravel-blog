@extends('front.layouts.template')

@section('content')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <div class="card mb-4 shadow-sm">
                    <a href="{{ url('article/' . $article->slug) }}"><img class="card-img-top single-img"
                            src="{{ asset('storage/back/' . $article->img) }}" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">
                            {{ $article->created_at->format('d M Y') }}
                            <a href=""
                                class="bg-primary badge text-decoration-none">{{ $article->Category->name }}
                            </a>
                        </div>
                        <h1 class="card-title">{{ $article->title }}</h1>
                        <p class="card-text">
                            {!! $article->desc !!}
                        </p>
                    </div>
                </div>
            </div>
            @include('front.layouts.side-widget')
        </div>
    </div>
@endsection
