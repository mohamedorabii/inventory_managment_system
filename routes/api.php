<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseDetailController;
use App\Http\Controllers\InventoryTransactionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Categories Routes
Route::apiResource('categories', CategoryController::class);

// Suppliers Routes
Route::apiResource('suppliers', SupplierController::class);

// Products Routes
Route::apiResource('products', ProductController::class);

// Customers Routes
Route::apiResource('customers', CustomerController::class);

// Orders Routes
Route::apiResource('orders', OrderController::class);

// Order Details Routes
Route::apiResource('order-details', OrderDetailController::class);

// Purchases Routes
Route::apiResource('purchases', PurchaseController::class);

// Purchase Details Routes
Route::apiResource('purchase-details', PurchaseDetailController::class);

// Inventory Transactions Routes
Route::apiResource('inventory-transactions', InventoryTransactionController::class);
