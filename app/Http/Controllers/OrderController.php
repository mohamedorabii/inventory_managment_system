<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('orders.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'order_date' => 'nullable|date',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:Pending,Completed,Cancelled',
        ]);

        Order::create($request->all());
        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    public function show($id)
    {
        $order = Order::with('customer', 'orderDetails.product')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $customers = Customer::all();
        return view('orders.edit', compact('order', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'order_date' => 'nullable|date',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:Pending,Completed,Cancelled',
        ]);

        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
}
