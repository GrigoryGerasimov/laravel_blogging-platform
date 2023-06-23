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
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 mb-4">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-outline-primary">New User</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Users</h3>
                            </div>

                            @if(!isset($usersList) || $usersList->isEmpty())
                                <span class="p-3">No users available</span>
                            @else
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th colspan="3"></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($usersList as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <a href="{{ route('admin.user.show', $user) }}"
                                                       class="text-dark">
                                                        <i class="fa fa-solid fa-file"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.user.edit', $user) }}"
                                                       class="text-dark">
                                                        <i role="button" class="fa fa-solid fa-pen"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.user.destroy', $user) }}" method="POST"
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
