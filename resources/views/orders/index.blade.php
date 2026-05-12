@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Orders</h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('orders.create') }}" class="btn btn-primary">Add Order</a>
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
                    <th>Customer</th>
                    <th>Order Date</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->customer->name }}</td>
                        <td>{{ $order->order_date->format('Y-m-d') }}</td>
                        <td>${{ number_format($order->total_price, 2) }}</td>
                        <td><span class="badge bg-{{ $order->status == 'Completed' ? 'success' : ($order->status == 'Pending' ? 'warning' : 'danger') }}">{{ $order->status }}</span></td>
                        <td>
                            <a href="{{ route('orders.show', $order->order_id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('orders.edit', $order->order_id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('orders.destroy', $order->order_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No orders found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
