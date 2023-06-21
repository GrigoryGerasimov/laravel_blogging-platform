@extends('admin.layouts.main')

@section('admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $post->title }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.post.update', $post) }}" method="POST" class="form"
                              enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input name="title" class="form-control @error('title') is-invalid @enderror"
                                           id="title" placeholder="Post Title"
                                           value="{{ @old('title') ?? $post->title }}">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="img">Preview Image</label>
                                    <div class="input-group">
                                        <img src="{{ asset('storage/' . $post->preview_img) }}" class="img-md" alt="current_preview_img"/>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="preview_img"
                                                   name="preview_img">
                                            <label class="custom-file-label" for="preview_img">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="file">Main Image</label>
                                    <div class="input-group">
                                        <img src="{{ asset('storage/' . $post->main_img) }}" class="img-md" alt="current_main_img"/>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="main_img" name="main_img">
                                            <label class="custom-file-label" for="main_img">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select id="category_id" name="category_id" class="form-control">
                                        @foreach($categoriesList as $category)
                                            <option
                                                value="{{ $category->id }}" {{ (old('category_id') ?? $post->category->id == $category->id) ? "selected" : "" }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tag_ids">Tags</label>
                                    <select id="tag_ids" name="tag_ids[]"
                                            class="select2 @error('tag_ids') is-invalid @enderror" multiple="multiple"
                                            data-placeholder="Select a Tag" style="width: 100%;">
                                        @foreach($tagsList as $tag)
                                            <option
                                                value="{{ $tag->id }}" {{ (old('tag_ids') ?? is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tag_ids')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-11">
                                <label for="summernote">Content</label>
                                <textarea id="summernote" name="content"
                                          class="@error('content') is-invalid @enderror">{{ old('content') ?? $post->content }}</textarea>
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

