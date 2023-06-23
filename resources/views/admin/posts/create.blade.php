@extends('admin.layouts.main')

@section('admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create New Post</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.post.store') }}" method="POST" class="form my-3"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-4 p-0">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input name="title" class="form-control @error('title') is-invalid @enderror"
                                           id="title" placeholder="Post Title"
                                           value="{{ @old('title') }}">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="preview_img">Preview Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"
                                                   class="custom-file-input @error('preview_img') is-invalid @enderror"
                                                   id="preview_img"
                                                   name="preview_img">
                                            <label class="custom-file-label" for="preview_img">Choose file</label>
                                        </div>
                                    </div>
                                    @error('preview_img')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="main_img">Main Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"
                                                   class="custom-file-input @error('main_img') is-invalid @enderror"
                                                   id="main_img" name="main_img">
                                            <label class="custom-file-label" for="main_img">Choose file</label>
                                        </div>
                                    </div>
                                    @error('main_img')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select id="category_id" name="category_id" class="form-control">
                                        @foreach($categoriesList as $category)
                                            <option
                                                value="{{ $category->id }}"
                                                {{ old('category_id') === $category->id && "selected" }}
                                            >
                                                {{ $category->name }}
                                            </option>
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
                                                value="{{ $tag->id }}"
                                                {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }}
                                            >
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tag_ids')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}" />

                            <div class="form-group col-11 p-0">
                                <label for="summernote">Content</label>
                                <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                                @error('content')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success my-3">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
