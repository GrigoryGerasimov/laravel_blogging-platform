@extends('profile.layouts.main')

@section('profile-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('profile.index') }}" class="text-dark mr-4">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Posts</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 mb-4">
                        <a href="{{ route('profile.post.create') }}" class="btn btn-outline-danger">New Post</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">My Posts</h3>
                            </div>

                            @if(!isset($postsList) || $postsList->isEmpty())
                                <span class="p-3">No posts available</span>
                            @else
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Post</th>
                                            <th colspan="3"></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($postsList as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>
                                                    <a href="{{ route('profile.post.show', $post) }}"
                                                       class="text-dark">
                                                        <i class="fa fa-solid fa-file"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('profile.post.edit', $post) }}"
                                                       class="text-dark">
                                                        <i role="button" class="fa fa-solid fa-pen"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('profile.post.destroy', $post) }}" method="POST"
                                                          enctype="application/x-www-form-urlencoded" class="text-dark">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="border-0 bg-transparent">
                                                            <i role="button" class="fa fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
