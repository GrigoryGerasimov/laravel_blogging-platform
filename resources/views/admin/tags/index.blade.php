@extends('admin.layouts.main')

@section('admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tags</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 mb-4">
                        <a href="{{ route('admin.tag.create') }}" class="btn btn-primary">New Tag</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tags</h3>
                            </div>

                            @if(!isset($tagsList) || $tagsList->isEmpty())
                                <span class="p-3">No tags available</span>
                            @else
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tag</th>
                                            <th colspan="3"></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($tagsList as $tag)
                                            <tr>
                                                <td>{{ $tag->id }}</td>
                                                <td>{{ $tag->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.tag.show', $tag) }}"
                                                       class="text-dark">
                                                        <i class="fa fa-solid fa-file"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.tag.edit', $tag) }}"
                                                       class="text-dark">
                                                        <i role="button" class="fa fa-solid fa-pen"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.tag.destroy', $tag) }}" method="POST"
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
