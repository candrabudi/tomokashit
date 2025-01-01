@extends('backoffice.layouts.app')

@section('content')
<div class="container">
    <h1>User Management</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add New User Form -->
    <div class="card mb-4">
        <div class="card-header">
            <h3>Create New User</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('system.users.management.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="role">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin">Admin</option>
                        <option value="member">Member</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create User</button>
            </form>
        </div>
    </div>

    <!-- Users Card List -->
    <div class="row mt-3">
        @foreach ($users as $user)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->username }}</h5>
                        <p class="card-text">Email: {{ $user->email }}</p>
                        <p class="card-text">Role: {{ ucfirst($user->role) }}</p>

                        <!-- Edit and Delete Buttons -->
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-warning btn-sm toggle-edit" data-target="#edit-form-{{ $user->id }}">Edit</button>

                            <!-- Delete Form -->
                            <form action="{{ route('system.users.management.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>

                        <!-- Edit Form (hidden by default) -->
                        <form action="{{ route('system.users.management.update', $user->id) }}" method="POST" id="edit-form-{{ $user->id }}" class="edit-form mt-3 d-none">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="role">Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>Member</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mb-2">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Manual Pagination -->
    <div class="pagination" style="margin-bottom: 50px;">
        @for ($i = 1; $i <= $users->lastPage(); $i++)
            <a href="{{ $users->url($i) }}" class="page-link {{ $users->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
        @endfor
    </div>
</div>

<script>
    // Toggle visibility of edit forms
    document.querySelectorAll('.toggle-edit').forEach(function(button) {
        button.addEventListener('click', function() {
            var formId = this.getAttribute('data-target');
            document.querySelector(formId).classList.toggle('d-none');
        });
    });
</script>
@endsection
