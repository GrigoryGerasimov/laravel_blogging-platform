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
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <a href="{{ route('admin.user.index') }}" class="text-dark mr-4">
                                    <i class="fas fa-angle-double-left"></i>
                                </a>
                                <h3 class="card-title">{{ $user->name }}</h3>
                                <div class="d-flex flex-grow-1 justify-content-end">
                                    <a href="{{ route('admin.user.edit', $user) }}" class="text-dark">
                                        <i role="button" class="fa fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.user.destroy', $user) }}" method="POST"
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
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td>{{ $user->password }}</td>
                                    </tr>
                                    <tr>
                                        <th>Role(s)</th>
                                        <td>{{ !$user->roles->isEmpty() ? trim($user->roles->reduce(fn($acc, $val) => $acc . ', ' . $val->name), ',') : 'No roles assigned to user' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td>{{ $user->password }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email Verified At</th>
                                        <td>{{ $user->email_verified_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $user->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $user->updated_at }}</td>
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

