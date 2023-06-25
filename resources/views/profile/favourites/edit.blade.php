@extends('profile.layouts.main')

@section('profile-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $favourite->title }}</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('profile.favourite.update', $favourite) }}" method="POST" class="form my-3"
                              enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input name="title" class="form-control @error('title') is-invalid @enderror"
                                           id="title" placeholder="Post Title"
                                           value="{{ @old('title') ?? $favourite->title }}">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="img">Preview Image</label>
                                    <div class="input-group">
                                        @if(isset($favourite->preview_img) && Storage::disk('public')->exists($favourite->preview_img))
                                            <img src="{{ asset('storage/' . $favourite->preview_img) }}" class="img-md"
                                                 alt="current_preview_img"/>
                                        @endif
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
                                        @if(isset($favourite->main_img) && Storage::disk('public')->exists($favourite->main_img))
                                            <img src="{{ asset('storage/' . $favourite->main_img) }}" class="img-md"
                                                 alt="current_main_img"/>
                                        @endif
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="main_img" name="main_img">
                                            <label class="custom-file-label" for="main_img">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="file">Supplementary Primary Image</label>
                                    <div class="input-group">
                                        @if(isset($favourite->suppl_prim_img) && Storage::disk('public')->exists($favourite->suppl_prim_img))
                                            <img src="{{ asset('storage/' . $favourite->suppl_prim_img) }}" class="img-md"
                                                 alt="current_main_img"/>
                                        @endif
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="suppl_prim_img" name="suppl_prim_img">
                                            <label class="custom-file-label" for="suppl_prim_img">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="file">Supplementary Secondary Image</label>
                                    <div class="input-group">
                                        @if(isset($favourite->suppl_sec_img) && Storage::disk('public')->exists($favourite->suppl_sec_img))
                                            <img src="{{ asset('storage/' . $favourite->suppl_sec_img) }}" class="img-md"
                                                 alt="current_main_img"/>
                                        @endif
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="suppl_sec_img" name="suppl_sec_img">
                                            <label class="custom-file-label" for="suppl_sec_img">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select id="category_id" name="category_id" class="form-control">
                                        @foreach($categoriesList as $category)
                                            <option
                                                value="{{ $category->id }}" {{ (old('category_id') ?? $favourite->category->id == $category->id) ? "selected" : "" }}>{{ $category->name }}</option>
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
                                                {{ (is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids'))) || (is_array($favourite->tags->pluck('id')->toArray()) && in_array($tag->id, $favourite->tags->pluck('id')->toArray())) ? 'selected' : '' }}
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

                            <div class="form-group col-11">
                                <label for="summernote">Content</label>
                                <textarea id="summernote" name="content"
                                          class="@error('content') is-invalid @enderror">{{ old('content') ?? $favourite->content }}</textarea>
                                @error('content')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success my-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

