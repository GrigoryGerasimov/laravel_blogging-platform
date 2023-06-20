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
                              enctype="application/x-www-form-urlencoded">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="title">Tag</label>
                                <input name="title" class="col-2 form-control" id="title" placeholder="Post Title" value="{{ @old('title') ?? $post->title }}">
                                @error('title')
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

