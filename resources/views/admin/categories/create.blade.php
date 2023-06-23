@extends('admin.layouts.main')

@section('admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create New Category</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.category.store') }}" method="POST" class="form my-3"
                              enctype="application/x-www-form-urlencoded">
                            @csrf
                            <div class="form-group">
                                <label for="name">Category</label>
                                <input name="name" class="col-2 form-control" id="name" placeholder="Category Name" value="{{ @old('name') }}">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info my-3">Create</button>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
