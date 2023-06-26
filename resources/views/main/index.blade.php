@extends('layouts.main')

@section('main-content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">
                @if(isset($paginatedPostsList) && $paginatedPostsList->isNotEmpty())
                    <div class="row">
                        @foreach($paginatedPostsList as $post)
                            <div class="col-md-4 featured-post blog-post" data-aos="fade-right">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{ asset('storage/' . $post->preview_img) }}" alt="preview image">
                                </div>
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <p class="blog-post-category">{{ $post->category->name }}</p>
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <small class="mr-3">{{ $post->likedByUsers->count() }}</small>
                                        <form action="{{ route('post.favourite.store', $post) }}" method="POST" enctype="application/x-www-form-urlencoded">
                                            @csrf
                                            <button type="submit" class="btn border-0 m-0 p-0 bg-transparent @guest() disabled @endguest">
                                                @if($post->likedByUsers->contains(auth()->user()->id))
                                                    Liked
                                                @else
                                                    Like
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <a href="{{ route('post.show', $post) }}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{ $post->title }}</h6>
                                </a>
                                <p class="blog-post-category mt-2">By {{ $post->user->name }}
                                    on {{ $post->created_at_formatted }}</p>
                            </div>
                        @endforeach
                    </div>
                    {{ $paginatedPostsList->links() }}
                @endif
            </section>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        @if(isset($randomPostsList) && $randomPostsList->isNotEmpty())
                            <div class="row blog-post-row">
                                @foreach($randomPostsList as $post)
                                    <div class="col-md-4 featured-post blog-post" data-aos="fade-right">
                                        <div class="blog-post-thumbnail-wrapper">
                                            <img src="{{ asset('storage/' . $post->preview_img) }}" alt="preview image">
                                        </div>
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <p class="blog-post-category">{{ $post->category->name }}</p>
                                            <div class="d-flex justify-content-between align-items-baseline">
                                                <small class="mr-3">{{ $post->likedByUsers->count() }}</small>
                                                <form action="{{ route('post.favourite.store', $post) }}" method="POST" enctype="application/x-www-form-urlencoded">
                                                    @csrf
                                                    <button type="submit" class="btn border-0 m-0 p-0 bg-transparent @guest() disabled @endguest">
                                                        @if($post->likedByUsers->contains(auth()->user()->id))
                                                            Liked
                                                        @else
                                                            Like
                                                        @endif
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <a href="{{ route('post.show', $post) }}" class="blog-post-permalink">
                                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                                        </a>
                                        <p class="blog-post-category mt-2">By {{ $post->user->name }}
                                            on {{ $post->created_at_formatted }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    @if(isset($topPostsList) && $topPostsList->isNotEmpty())
                        <div class="widget widget-post-list">
                            <h5 class="widget-title">Top 5 Posts</h5>
                            <ul class="post-list">
                                @foreach($topPostsList as $topPost)
                                    <li class="post">
                                        <a href="{{ route('post.show', $topPost) }}" class="post-permalink media">
                                            <img src="{{ asset('storage/' . $topPost->preview_img) }}"
                                                 alt="preview image">
                                            <div class="media-body">
                                                <h6 class="post-title">{{ $topPost->title }}</h6>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(isset($mostCommentedPostsList) && $mostCommentedPostsList->isNotEmpty())
                        <div class="widget widget-post-list">
                            <h5 class="widget-title">5 Most Commented Posts</h5>
                            <ul class="post-list">
                                @foreach($mostCommentedPostsList as $mostCommentedPost)
                                    <li class="post">
                                        <a href="{{ route('post.show', $mostCommentedPost) }}"
                                           class="post-permalink media">
                                            <img src="{{ asset('storage/' . $mostCommentedPost->preview_img) }}"
                                                 alt="preview image">
                                            <div class="media-body">
                                                <h6 class="post-title">{{ $mostCommentedPost->title }}</h6>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
