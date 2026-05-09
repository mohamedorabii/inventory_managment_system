@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>{{ $supplier->name }}</h1>
            <hr>

            <div class="card">
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $supplier->supplier_id }}</p>
                    <p><strong>Name:</strong> {{ $supplier->name }}</p>
                    <p><strong>Phone:</strong> {{ $supplier->phone ?? 'N/A' }}</p>
                    <p><strong>Email:</strong> {{ $supplier->email ?? 'N/A' }}</p>
                    <p><strong>Address:</strong> {{ $supplier->address ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('suppliers.edit', $supplier->supplier_id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('suppliers.destroy', $supplier->supplier_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
