@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1 class="mb-0">{{ __('Dashboard') }}</h1>
            <p class="text-muted">{{ __('Welcome to Inventory Management System') }}</p>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card border-left-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="card-text text-muted mb-0">{{ __('Total Products') }}</p>
                            <h4 class="mb-0">{{ \App\Models\Product::count() }}</h4>
                        </div>
                        <i class="fas fa-box fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card border-left-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="card-text text-muted mb-0">{{ __('Total Orders') }}</p>
                            <h4 class="mb-0">{{ \App\Models\Order::count() }}</h4>
                        </div>
                        <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card border-left-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="card-text text-muted mb-0">{{ __('Total Purchases') }}</p>
                            <h4 class="mb-0">{{ \App\Models\Purchase::count() }}</h4>
                        </div>
                        <i class="fas fa-truck fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card border-left-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="card-text text-muted mb-0">{{ __('Total Customers') }}</p>
                            <h4 class="mb-0">{{ \App\Models\Customer::count() }}</h4>
                        </div>
                        <i class="fas fa-users fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">{{ __('Quick Actions') }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <a href="{{ route('categories.index') }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-tag me-2"></i>{{ __('Categories') }}
                            </a>
                        </div>
                        <div class="col-md-2 mb-2">
                            <a href="{{ route('suppliers.index') }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-building me-2"></i>{{ __('Suppliers') }}
                            </a>
                        </div>
                        <div class="col-md-2 mb-2">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-box me-2"></i>{{ __('Products') }}
                            </a>
                        </div>
                        <div class="col-md-2 mb-2">
                            <a href="{{ route('customers.index') }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-user-tie me-2"></i>{{ __('Customers') }}
                            </a>
                        </div>
                        <div class="col-md-2 mb-2">
                            <a href="{{ route('orders.index') }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-shopping-cart me-2"></i>{{ __('Orders') }}
                            </a>
                        </div>
                        <div class="col-md-2 mb-2">
                            <a href="{{ route('purchases.index') }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-truck me-2"></i>{{ __('Purchases') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Create Buttons -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">{{ __('Create New') }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <a href="{{ route('categories.create') }}" class="btn btn-success w-100">
                                <i class="fas fa-plus me-2"></i>{{ __('Category') }}
                            </a>
                        </div>
                        <div class="col-md-2 mb-2">
                            <a href="{{ route('suppliers.create') }}" class="btn btn-success w-100">
                                <i class="fas fa-plus me-2"></i>{{ __('Supplier') }}
                            </a>
                        </div>
                        <div class="col-md-2 mb-2">
                            <a href="{{ route('products.create') }}" class="btn btn-success w-100">
                                <i class="fas fa-plus me-2"></i>{{ __('Product') }}
                            </a>
                        </div>
                        <div class="col-md-2 mb-2">
                            <a href="{{ route('customers.create') }}" class="btn btn-success w-100">
                                <i class="fas fa-plus me-2"></i>{{ __('Customer') }}
                            </a>
                        </div>
                        <div class="col-md-2 mb-2">
                            <a href="{{ route('orders.create') }}" class="btn btn-success w-100">
                                <i class="fas fa-plus me-2"></i>{{ __('Order') }}
                            </a>
                        </div>
                        <div class="col-md-2 mb-2">
                            <a href="{{ route('purchases.create') }}" class="btn btn-success w-100">
                                <i class="fas fa-plus me-2"></i>{{ __('Purchase') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .border-left-primary { border-left: 4px solid #007bff; }
    .border-left-success { border-left: 4px solid #28a745; }
    .border-left-info { border-left: 4px solid #17a2b8; }
    .border-left-warning { border-left: 4px solid #ffc107; }
    .card { box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,0.075); }
</style>
@endsection
