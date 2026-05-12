@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Order #{{ $order->order_id }}</h1>
            <hr>

            <div class="card">
                <div class="card-body">
                    <p><strong>Customer:</strong> {{ $order->customer->name }}</p>
                    <p><strong>Order Date:</strong> {{ $order->order_date->format('Y-m-d') }}</p>
                    <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
                    <p><strong>Status:</strong> <span class="badge bg-{{ $order->status == 'Completed' ? 'success' : ($order->status == 'Pending' ? 'warning' : 'danger') }}">{{ $order->status }}</span></p>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('orders.edit', $order->order_id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('orders.destroy', $order->order_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
