@extends('layouts.main')

@section('main-content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Written by {{ $post->user->name }}
                • {{ $post->created_at_formatted }} • {{ $post->category->name }} • {{ $post->likedByUsers->count() }}
                Likes • {{ $post->comments->count() }}
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
                <div class="row mb-5">
                    @if(isset($post->main_img) && Storage::disk('public')->exists($post->main_img))
                        <div class="col-md-4 mb-3" data-aos="fade-right">
                            <img src="{{ asset('storage/' . $post->main_img) }}" alt="main image" class="img-fluid">
                        </div>
                    @endif
                    @if(isset($post->suppl_prim_img) && Storage::disk('public')->exists($post->suppl_prim_img))
                        <div class="col-md-4 mb-3" data-aos="fade-right">
                            <img src="{{ asset('storage/' . $post->suppl_prim_img) }}"
                                 alt="supplementary primary image" class="img-fluid">
                        </div>
                    @endif
                    @if(isset($post->suppl_sec_img) && Storage::disk('public')->exists($post->suppl_sec_img))
                        <div class="col-md-4 mb-3" data-aos="fade-right">
                            <img src="{{ asset('storage/' . $post->suppl_sec_img) }}"
                                 alt="supplementary secondary image" class="img-fluid">
                        </div>
                    @endif
                </div>
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
                        @if(isset($relatedPosts) && $relatedPosts->isNotEmpty())
                            <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        @if(isset($relatedPost->preview_img) && Storage::disk('public')->exists($relatedPost->preview_img))
                                            <img src="{{ asset('storage/' . $relatedPost->preview_img) }}"
                                                 alt="related post image"
                                                 class="post-thumbnail">
                                        @endif
                                        <p class="post-category">{{ $relatedPost->category->name }}</p>
                                        <h5 class="post-title">{{ $relatedPost->title }}</h5>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </section>
                    <section class="mb-5">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h2 class="section-title mb-4" data-aos="fade-up">{{ $post->comments->count() }} Comments</h2>
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
                        @foreach($post->comments as $comment)
                            <div class="mb-3 p-4" style="background-color: #f6f6f6">
                                <div class="d-flex justify-content-between">
                                    <h6>{{ $comment->user->name }}</h6>
                                    <div class="d-flex justify-content-between">
                                        <p class="mr-3">{{ $comment->created_at_formatted->diffForHumans() }}</p>
                                        <form action="{{ route('post.comment.destroy', [$post, $comment]) }}" method="POST" enctype="application/x-www-form-urlencoded">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i role="button" class="fa fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div>
                                    {!! $comment->content !!}
                                </div>
                            </div>
                        @endforeach
                    </section>
                    <section class="comment-section">
                        <form action="{{ route('post.comment.store', $post) }}" method="post"
                              enctype="application/x-www-form-urlencoded">
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
