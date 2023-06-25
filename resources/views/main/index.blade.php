@extends('layouts.main')

@section('main-content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @if(!isset($postsList) || $postsList->isEmpty())
                        <p>No posts available</p>
                    @endif

                    @foreach($postsList as $post)
                        <div class="col-md-4 featured-post blog-post" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/' . $post->preview_img) }}" alt="blog post">
                            </div>
                            <p class="blog-post-category">{{ $post->category->name }}</p>
                            <a href="{{ route('post.show', $post) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                            <p class="blog-post-category mt-2">By {{ $post->user->name }} on {{ $post->created_at_formatted }}</p>
                        </div>
                    @endforeach
                </div>
                {{ $postsList->links() }}
            </section>
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @if(!isset($postsList) || $postsList->isEmpty())
                                <p>No posts available</p>
                            @endif

                            @foreach($postsList as $post)
                                <div class="col-md-4 featured-post blog-post" data-aos="fade-right">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{ asset('storage/' . $post->preview_img) }}" alt="blog post">
                                    </div>
                                    <p class="blog-post-category">{{ $post->category->name }}</p>
                                    <a href="{{ route('post.show', $post) }}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{ $post->title }}</h6>
                                    </a>
                                    <p class="blog-post-category mt-2">By {{ $post->user->name }} on {{ $post->created_at_formatted }}</p>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Top 5 Posts</h5>
                        <ul class="post-list">
                            @if(!isset($topPostsList) || $topPostsList->isEmpty())
                                <p>No top posts available</p>
                            @endif

                            @foreach($topPostsList as $topPost)
                                    <li class="post">
                                        <a href="{{ route('post.show', $topPost) }}" class="post-permalink media">
                                            <img src="{{ asset('storage/' . $topPost->preview_img) }}" alt="blog post">
                                            <div class="media-body">
                                                <h6 class="post-title">{{ $topPost->title }}</h6>
                                            </div>
                                        </a>
                                    </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">5 Most Commented Posts</h5>
                        <ul class="post-list">
                            @if(!isset($mostCommentedPostsList) || $mostCommentedPostsList->isEmpty())
                                <p>No most commented posts available</p>
                            @endif

                            @foreach($mostCommentedPostsList as $mostCommentedPost)
                                <li class="post">
                                    <a href="{{ route('post.show', $mostCommentedPost) }}" class="post-permalink media">
                                        <img src="{{ asset('storage/' . $mostCommentedPost->preview_img) }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{ $mostCommentedPost->title }}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
