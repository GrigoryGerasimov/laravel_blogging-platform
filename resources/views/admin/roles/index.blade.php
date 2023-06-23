@extends('admin.layouts.main')

@section('admin-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('admin.index') }}" class="text-dark mr-4">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Roles</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 mb-4">
                        <a href="{{ route('admin.role.create') }}" class="btn btn-primary">New Role</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Roles</h3>
                            </div>

                            @if(!isset($rolesList) || $rolesList->isEmpty())
                                <span class="p-3">No roles available</span>
                            @else
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Role</th>
                                            <th colspan="3"></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($rolesList as $role)
                                            <tr>
                                                <td>{{ $role->id }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.role.show', $role) }}"
                                                       class="text-dark">
                                                        <i class="fa fa-solid fa-file"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.role.edit', $role) }}"
                                                       class="text-dark">
                                                        <i role="button" class="fa fa-solid fa-pen"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.role.destroy', $role) }}" method="POST"
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
