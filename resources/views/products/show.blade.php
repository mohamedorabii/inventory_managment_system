@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>{{ $product->name }}</h1>
            <hr>

            <div class="card">
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $product->product_id }}</p>
                    <p><strong>Name:</strong> {{ $product->name }}</p>
                    <p><strong>Description:</strong> {{ $product->description ?? 'N/A' }}</p>
                    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                    <p><strong>Quantity:</strong> <span class="badge bg-{{ $product->quantity > 0 ? 'success' : 'danger' }}">{{ $product->quantity }}</span></p>
                    <p><strong>Category:</strong> {{ $product->category->category_name }}</p>
                    <p><strong>Supplier:</strong> {{ $product->supplier->name }}</p>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('products.destroy', $product->product_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
