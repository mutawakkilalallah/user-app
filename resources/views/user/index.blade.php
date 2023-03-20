@extends('layout')
@section('content')
    <a href="/user/create" class="btn btn-success btn-sm mb-3"><i class="fas fa-plus"></i> Add User</a>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Users Data</h3>
        </div>

        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $i => $user)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ '@' . $user->name }}</td>
                            <td>{{ '@' . $user->username }}</td>
                            <td>
                                <a href="/user/edit/{{ $user->id }}" class="badge bg-warning">Edit</a>
                                <a href="/user/edit-password/{{ $user->id }}" class="badge bg-info">Change Password</a>
                                <a href="/user/delete/{{ $user->id }}" class="badge bg-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
