@extends('layouts.main')

@section('main-content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $category->name }}</h1>
            <section class="featured-posts-section">
                @if(isset($relatedPostsList) && $relatedPostsList->isNotEmpty())
                    <div class="row">
                        @foreach($relatedPostsList as $relatedPost)
                            <div class="col-md-4 featured-post blog-post" data-aos="fade-right">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{ asset('storage/' . $relatedPost->preview_img) }}" alt="preview image">
                                </div>
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <p class="blog-post-category">{{ $relatedPost->category->name }}</p>
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <small class="mr-3">{{ $relatedPost->likedByUsers->count() }}</small>
                                        <form action="{{ route('post.favourite.store', $relatedPost) }}" method="POST"
                                              enctype="application/x-www-form-urlencoded">
                                            @csrf
                                            <button type="submit" class="btn border-0 m-0 p-0 bg-transparent"
                                                    @guest() disabled @endguest>
                                                <i class="nav-icon fa{{ !is_null(auth()->user()) && $relatedPost->likedByUsers->contains(auth()->user()->id) ? 's' : 'r' }} fa-heart"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <a href="{{ route('post.show', $relatedPost) }}" class="blog-post-permalink">
                                    <h6 class="my-3 blog-post-title">{{ $relatedPost->title }}</h6>
                                </a>
                                <div class="text-right">
                                    <small class="mt-2">By {{ $relatedPost->user->name }}
                                        on {{ $relatedPost->createdAtDateFormatted }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
        </div>
    </main>
@endsection
