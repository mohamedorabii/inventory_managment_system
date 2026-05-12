<?php

namespace App\Http\Controllers;

use App\Models\InventoryTransaction;
use Illuminate\Http\Request;

class InventoryTransactionController extends Controller
{
    public function index()
    {
        $transactions = InventoryTransaction::with('product')->get();
        return response()->json($transactions, 200);
    }

    public function show($id)
    {
        $transaction = InventoryTransaction::with('product')->find($id);
        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }
        return response()->json($transaction, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'type' => 'required|in:IN,OUT',
            'quantity' => 'required|integer|min:1',
            'transaction_date' => 'nullable|date',
        ]);

        $transaction = InventoryTransaction::create($request->all());
        return response()->json($transaction, 201);
    }

    public function update(Request $request, $id)
    {
        $transaction = InventoryTransaction::find($id);
        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'type' => 'required|in:IN,OUT',
            'quantity' => 'required|integer|min:1',
            'transaction_date' => 'nullable|date',
        ]);

        $transaction->update($request->all());
        return response()->json($transaction, 200);
    }

    public function destroy($id)
    {
        $transaction = InventoryTransaction::find($id);
        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }
        $transaction->delete();
        return response()->json(['message' => 'Transaction deleted'], 200);
    }
}
