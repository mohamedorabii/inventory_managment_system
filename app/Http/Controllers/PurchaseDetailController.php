<?php

namespace App\Http\Controllers;

use App\Models\PurchaseDetail;
use Illuminate\Http\Request;

class PurchaseDetailController extends Controller
{
    public function index()
    {
        $details = PurchaseDetail::with('purchase', 'product')->get();
        return response()->json($details, 200);
    }

    public function show($id)
    {
        $detail = PurchaseDetail::with('purchase', 'product')->find($id);
        if (!$detail) {
            return response()->json(['message' => 'Purchase detail not found'], 404);
        }
        return response()->json($detail, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'purchase_id' => 'required|exists:purchases,purchase_id',
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'required|integer|min:1',
            'cost' => 'required|numeric|min:0',
        ]);

        $detail = PurchaseDetail::create($request->all());
        return response()->json($detail, 201);
    }

    public function update(Request $request, $id)
    {
        $detail = PurchaseDetail::find($id);
        if (!$detail) {
            return response()->json(['message' => 'Purchase detail not found'], 404);
        }

        $request->validate([
            'purchase_id' => 'required|exists:purchases,purchase_id',
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'required|integer|min:1',
            'cost' => 'required|numeric|min:0',
        ]);

        $detail->update($request->all());
        return response()->json($detail, 200);
    }

    public function destroy($id)
    {
        $detail = PurchaseDetail::find($id);
        if (!$detail) {
            return response()->json(['message' => 'Purchase detail not found'], 404);
        }
        $detail->delete();
        return response()->json(['message' => 'Purchase detail deleted'], 200);
    }
}
