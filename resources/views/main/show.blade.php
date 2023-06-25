@extends('layouts.main')

@section('main-content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Written by {{ $post->user->name }}
                • {{ $post->created_at_formatted }} • {{ $post->category->name }} • {{ $post->comments->count() }}
                Comments</p>
            @if(isset($post->preview_img) && Storage::disk('public')->exists($post->preview_img))
                <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                    <img src="{{ asset('storage/' . $post->preview_img) }}" alt="featured image" class="w-100">
                </section>
            @endif
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
                @if(isset($post->main_img) && Storage::disk('public')->exists($post->main_img))
                    <div class="row mb-5">
                        <div class="col-md-4 mb-3" data-aos="fade-right">
                            <img src="{{ asset('storage/' . $post->main_img) }}" alt="blog post" class="img-fluid">
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <blockquote data-aos="fade-up">
                            {!! $post->content !!}
                            <footer class="blockquote-footer">Some famous quote</footer>
                        </blockquote>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @if(!isset($relatedPosts) || $relatedPosts->isEmpty())
                                <p>No related posts identified</p>
                            @endif
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    @if(isset($relatedPost->preview_img) && Storage::disk('public')->exists($relatedPost->preview_img))
                                        <img src="{{ asset('storage/' . $relatedPost->preview_img) }}"
                                             alt="related post"
                                             class="post-thumbnail">
                                    @endif
                                    <p class="post-category">{{ $relatedPost->category->name }}</p>
                                    <h5 class="post-title">{{ $relatedPost->title }}</h5>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <section class="mb-5">
                        <h2 class="section-title mb-4" data-aos="fade-up">{{ $post->comments->count() }} Comments</h2>
                        @foreach($post->comments as $comment)
                            <div class="mb-3 p-4" style="background-color: #f6f6f6">
                                <div class="d-flex justify-content-between">
                                    <h6>{{ $comment->user->name }}</h6>
                                    <p>{{ $comment->created_at_formatted->diffForHumans() }}</p>
                                </div>
                                <div>
                                    {!! $comment->content !!}
                                </div>
                            </div>
                        @endforeach
                    </section>
                    <section class="comment-section">
                        <form action="{{ route('post.comment.store', $post) }}" method="post" enctype="application/x-www-form-urlencoded">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="content" class="sr-only">Comment</label>
                                    <textarea name="content" id="content" class="form-control" placeholder="Comment"
                                              rows="10">Comment</textarea>
                                </div>
                            </div>
                            <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}"/>
                            <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}"/>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
