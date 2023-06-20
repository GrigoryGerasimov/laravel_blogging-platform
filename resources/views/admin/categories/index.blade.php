@extends('admin.layouts.main')

@section('admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 mb-4">
                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">New Category</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Categories</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category</th>
                                        <th colspan="3"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(empty($categoriesList))
                                        <p>No categories available</p>
                                    @endif

                                    @foreach($categoriesList as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.category.show', $category) }}"
                                                   class="text-dark">
                                                    <i class="fa fa-solid fa-file"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.category.edit', $category) }}"
                                                   class="text-dark">
                                                    <i role="button" class="fa fa-solid fa-pen"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.category.destroy', $category) }}" method="POST"
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
