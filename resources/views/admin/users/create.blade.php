@extends('admin.layouts.main')

@section('admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create New User</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4">
                        <form action="{{ route('admin.user.store') }}" method="POST" class="form"
                              enctype="application/x-www-form-urlencoded">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" class="form-control" id="name" placeholder="Name" value="{{ @old('name') }}">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ @old('email') }}">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role_ids">Roles</label>
                                <select id="role_ids" name="role_ids[]"
                                        class="select2 @error('role_ids') is-invalid @enderror" multiple="multiple"
                                        data-placeholder="Select a Tag" style="width: 100%;">
                                    @foreach($rolesList as $role)
                                        <option
                                            value="{{ $role->id }}"
                                            {{ is_array(old('role_ids')) && in_array($role->id, old('role_ids')) ? 'selected' : '' }}
                                        >
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_ids')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Create</button>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
