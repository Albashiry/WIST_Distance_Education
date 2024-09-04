@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cycles</h1>
    <a href="{{ route('cycles.create') }}" class="btn btn-primary">Create Cycle</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cycles as $cycle)
                <tr>
                    <td>{{ $cycle->id }}</td>
                    <td>{{ $cycle->name }}</td>
                    <td>{{ $cycle->description }}</td>
                    <td>
                        <a href="{{ route('cycles.edit', $cycle->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('cycles.destroy', $cycle->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection