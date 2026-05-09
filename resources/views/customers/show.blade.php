@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>{{ $customer->name }}</h1>
            <hr>

            <div class="card">
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $customer->customer_id }}</p>
                    <p><strong>Name:</strong> {{ $customer->name }}</p>
                    <p><strong>Phone:</strong> {{ $customer->phone ?? 'N/A' }}</p>
                    <p><strong>Email:</strong> {{ $customer->email ?? 'N/A' }}</p>
                    <p><strong>Address:</strong> {{ $customer->address ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('customers.edit', $customer->customer_id) }}" class="btn btn-warning">Edit</a>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
                <form action="{{ route('customers.destroy', $customer->customer_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
