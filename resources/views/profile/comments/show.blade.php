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
                                <a href="{{ route('profile.comment.index') }}" class="text-dark mr-4">
                                    <i class="fas fa-angle-double-left"></i>
                                </a>
                                <h3 class="card-title">Comment to Post {{ $comment->post->id }} {{ $comment->post->title }}</h3>
                                <div class="d-flex flex-grow-1 justify-content-end">
                                    <a href="{{ route('profile.comment.edit', $comment) }}" class="text-dark">
                                        <i role="button" class="fa fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('profile.comment.destroy', $comment) }}" method="POST"
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
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $comment->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Content</th>
                                        <td>{{ $comment->content }}</td>
                                    </tr>
                                    <tr>
                                        <th>Left By</th>
                                        <td>{{ $comment->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $comment->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $comment->updated_at }}</td>
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

