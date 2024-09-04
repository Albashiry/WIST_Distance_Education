@extends('layouts.app')

@section('content')
  <div class="container">

    <!-- Check if the user has a specific permission -->
    @can('delete users')
      <form action="{{ route('users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    @endcan

    <h2>Edit User</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
        <small>Leave blank to keep the current password</small>
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" name="phone" id="phone" value="{{ $user->phone }}">
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" id="address" value="{{ $user->address }}">
      </div>
      <div class="form-group">
        <label for="role">Role</label>
        <select name="role" class="form-control" required>
          <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
          <option value="user" {{ $user->hasRole('manager') ? 'selected' : '' }}>Manager</option>
          <option value="user" {{ $user->hasRole('editor') ? 'selected' : '' }}>Editor</option>
          <option value="user" {{ $user->hasRole('user') ? 'selected' : '' }}>User</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
@endsection
