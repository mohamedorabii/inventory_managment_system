@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Edit Purchase</h1>
            <hr>

            <form action="{{ route('purchases.update', $purchase->purchase_id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="supplier_id" class="form-label">Supplier</label>
                    <select class="form-control @error('supplier_id') is-invalid @enderror" id="supplier_id" name="supplier_id" required>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->supplier_id }}" {{ old('supplier_id', $purchase->supplier_id) == $supplier->supplier_id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                    @error('supplier_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="purchase_date" class="form-label">Purchase Date</label>
                    <input type="date" class="form-control @error('purchase_date') is-invalid @enderror" id="purchase_date" name="purchase_date" value="{{ old('purchase_date', $purchase->purchase_date->format('Y-m-d')) }}">
                    @error('purchase_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="total_cost" class="form-label">Total Cost</label>
                    <input type="number" step="0.01" class="form-control @error('total_cost') is-invalid @enderror" id="total_cost" name="total_cost" value="{{ old('total_cost', $purchase->total_cost) }}" required>
                    @error('total_cost') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('purchases.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
