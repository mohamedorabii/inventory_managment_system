@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Purchase #{{ $purchase->purchase_id }}</h1>
            <hr>

            <div class="card">
                <div class="card-body">
                    <p><strong>Supplier:</strong> {{ $purchase->supplier->name }}</p>
                    <p><strong>Purchase Date:</strong> {{ $purchase->purchase_date->format('Y-m-d') }}</p>
                    <p><strong>Total Cost:</strong> ${{ number_format($purchase->total_cost, 2) }}</p>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('purchases.edit', $purchase->purchase_id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('purchases.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('purchases.destroy', $purchase->purchase_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
