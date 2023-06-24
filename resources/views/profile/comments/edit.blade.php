@extends('profile.layouts.main')

@section('profile-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Comment to Post {{ $comment->post->id }} {{ $comment->post->title }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('profile.comment.update', $comment) }}" method="POST" class="form"
                              enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="form-group col-4 p-0">
                                <label for="post_id">Post</label>
                                <select id="post_id" name="post_id" class="form-control">
                                    @foreach($postsList as $post)
                                        <option
                                            value="{{ $post->id }}"
                                            {{ old('post_id') === $post->id && "selected" }}
                                        >
                                            {{ $post->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}" />

                            <div class="form-group col-11 p-0">
                                <label for="summernote">Content</label>
                                <textarea id="summernote" name="content"
                                          class="@error('content') is-invalid @enderror">{{ old('content') ?? $comment->content }}</textarea>
                                @error('content')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

