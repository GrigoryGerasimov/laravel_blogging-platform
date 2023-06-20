@extends('admin.layouts.main')

@section('admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2"></div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 mb-4">
                        <a href="{{ route('admin.tag.index') }}" class="text-dark">Back</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">{{ $tag->name }}</h3>
                                <div class="d-flex flex-grow-1 justify-content-end">
                                    <a href="{{ route('admin.tag.edit', $tag) }}" class="text-dark">
                                        <i role="button" class="fa fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.tag.destroy', $tag) }}" method="POST"
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
                                        <td>{{ $tag->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tag</th>
                                        <td>{{ $tag->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $tag->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $tag->updated_at }}</td>
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

