@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $cycle->name }}</h1>
    <p>{{ $cycle->description }}</p>
    <a href="{{ route('cycles.index') }}" class="btn btn-primary">Back</a>
</div>
@endsection