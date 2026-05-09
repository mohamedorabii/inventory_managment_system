@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Suppliers</h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Add Supplier</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->supplier_id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->phone ?? '-' }}</td>
                    <td>{{ $supplier->email ?? '-' }}</td>
                    <td>{{ Str::limit($supplier->address, 30) ?? '-' }}</td>
                    <td>
                        <a href="{{ route('suppliers.show', $supplier->supplier_id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('suppliers.edit', $supplier->supplier_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('suppliers.destroy', $supplier->supplier_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No suppliers found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
