@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>{{ $category->category_name }}</h1>
            <hr>

            <div class="card">
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $category->category_id }}</p>
                    <p><strong>Name:</strong> {{ $category->category_name }}</p>
                    <p><strong>Description:</strong> {{ $category->description ?? 'N/A' }}</p>
                    <p><strong>Created:</strong> {{ $category->created_at->format('Y-m-d H:i:s') }}</p>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('categories.edit', $category->category_id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('categories.destroy', $category->category_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
