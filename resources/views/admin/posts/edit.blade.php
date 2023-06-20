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
                                                value="{{ $category->id }}" {{ $post->category->id == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
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

