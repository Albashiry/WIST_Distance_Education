@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Create New User</h2>
    <form action="{{ route('users.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" name="phone" id="phone">
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" id="address">
      </div>

      <div class="form-group">
        <label for="role">Role</label>
        <select name="role" class="form-control" required>
          <option value="admin">Admin</option>
          <option value="user">Manager</option>
          <option value="user">Editor</option>
          <option value="user">User</option>
        </select>
      </div>
      
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
@endsection
