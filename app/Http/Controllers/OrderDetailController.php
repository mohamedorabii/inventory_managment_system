<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $details = OrderDetail::with('order', 'product')->get();
        return response()->json($details, 200);
    }

    public function show($id)
    {
        $detail = OrderDetail::with('order', 'product')->find($id);
        if (!$detail) {
            return response()->json(['message' => 'Order detail not found'], 404);
        }
        return response()->json($detail, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,order_id',
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $detail = OrderDetail::create($request->all());
        return response()->json($detail, 201);
    }

    public function update(Request $request, $id)
    {
        $detail = OrderDetail::find($id);
        if (!$detail) {
            return response()->json(['message' => 'Order detail not found'], 404);
        }

        $request->validate([
            'order_id' => 'required|exists:orders,order_id',
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $detail->update($request->all());
        return response()->json($detail, 200);
    }

    public function destroy($id)
    {
        $detail = OrderDetail::find($id);
        if (!$detail) {
            return response()->json(['message' => 'Order detail not found'], 404);
        }
        $detail->delete();
        return response()->json(['message' => 'Order detail deleted'], 200);
    }
}
