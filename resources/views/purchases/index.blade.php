@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Purchases</h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('purchases.create') }}" class="btn btn-primary">Add Purchase</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Supplier</th>
                    <th>Purchase Date</th>
                    <th>Total Cost</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($purchases as $purchase)
                    <tr>
                        <td>{{ $purchase->purchase_id }}</td>
                        <td>{{ $purchase->supplier->name }}</td>
                        <td>{{ $purchase->purchase_date->format('Y-m-d') }}</td>
                        <td>${{ number_format($purchase->total_cost, 2) }}</td>
                        <td>
                            <a href="{{ route('purchases.show', $purchase->purchase_id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('purchases.edit', $purchase->purchase_id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('purchases.destroy', $purchase->purchase_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No purchases found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
