@extends('profile.layouts.main')

@section('profile-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2"></div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <a href="{{ route('profile.post.index') }}" class="text-dark mr-4">
                                    <i class="fas fa-angle-double-left"></i>
                                </a>
                                <h3 class="card-title">{{ $post->title }}</h3>
                                <div class="d-flex flex-grow-1 justify-content-end">
                                    <a href="{{ route('profile.post.edit', $post) }}" class="text-dark">
                                        <i role="button" class="fa fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('profile.post.destroy', $post) }}" method="POST"
                                          enctype="application/x-www-form-urlencoded" class="text-dark ml-5">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i role="button" class="fa fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $post->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Author</th>
                                        <td>{{ $post->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $post->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Content</th>
                                        <td>{{ $post->content }}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{ $post->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tags</th>
                                        <td>
                                            {{ trim($post->tags->reduce(fn($acc, $val) => $acc . ', ' . $val->name), ',') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Preview Image</th>
                                        @if(isset($post->preview_img) && Storage::disk('public')->exists($post->preview_img))
                                            <td>
                                                <img src="{{ asset('storage/' . $post->preview_img) }}"
                                                     class="img-size-64" alt="preview_image"/>
                                            </td>
                                        @else
                                            <td>No image available</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Main Image</th>
                                        @if(isset($post->main_img) && Storage::disk('public')->exists($post->main_img))
                                            <td>
                                                <img src="{{ asset('storage/' . $post->main_img) }}" class="img-size-64"
                                                     alt="main_image"/>
                                            </td>
                                        @else
                                            <td>No image available</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Supplementary Primary Image</th>
                                        @if(isset($post->suppl_prim_img) && Storage::disk('public')->exists($post->suppl_prim_img))
                                            <td>
                                                <img src="{{ asset('storage/' . $post->suppl_prim_img) }}" class="img-size-64"
                                                     alt="suppl_prim_img"/>
                                            </td>
                                        @else
                                            <td>No image available</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Supplementary Secondary Image</th>
                                        @if(isset($post->suppl_sec_img) && Storage::disk('public')->exists($post->suppl_sec_img))
                                            <td>
                                                <img src="{{ asset('storage/' . $post->suppl_sec_img) }}" class="img-size-64"
                                                     alt="suppl_sec_img"/>
                                            </td>
                                        @else
                                            <td>No image available</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $post->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $post->updated_at }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

