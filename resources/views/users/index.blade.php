@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Users List</h2>
    {{-- @php
      if (auth()->user()->hasRole('admin')) {
          // User is an admin
      }

      if (auth()->user()->can('edit users')) {
          // User has permission to manage users
      }
    @endphp --}}

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @php
          $i = 0;
        @endphp
        @foreach ($users as $user)
          <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->address }}</td>
            <td>
              {{-- Applying the Permission System using can directive --}}
              @can('edit users')
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                @if (Auth::user()->id !== $user->id)
                  <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                @endif
              @endcan
              @cannot('edit users')
                <p class="text-danger">No action permited</p>
              @endcannot
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{-- pagination to handle large numbers of users --}}
    {!! $users->links() !!}

  </div>
@endsection
