<?php

namespace App\Http\Controllers;

use App\Models\StockHistory;
use App\Models\Product;
use Illuminate\Http\Request;

class StockHistoryController extends Controller
{

    // List all stock history records
    public function index()
    {
        $stockHistories = StockHistory::with('product')->get();
        return view('stock_histories.index', compact('stockHistories'));
    }

    // Show form to create a new stock history record
    public function create()
    {
        $products = Product::all(); // Pass products for selection
        return view('stock_histories.create', compact('products'));
    }

    // Store a newly created stock history record in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,_pid',
            'action_type' => 'required|string',
            'quantity_changed' => 'required|integer',
            'last_quantity' => 'required|integer',
            'current_quantity' => 'required|integer',
        ]);

        StockHistory::create($validatedData);
        return redirect()->route('stock_histories.index')->with('success', 'Stock history record created successfully.');
    }

    // Show details of a specific stock history record
    public function show($id)
    {
        $stockHistory = StockHistory::with('product')->findOrFail($id);
        return view('stock_histories.show', compact('stockHistory'));
    }

    // Show form to edit a stock history record
    public function edit($id)
    {
        $stockHistory = StockHistory::findOrFail($id);
        $products = Product::all(); // Pass products for selection
        return view('stock_histories.edit', compact('stockHistory', 'products'));
    }

    // Update an existing stock history record
    public function update(Request $request, $id)
    {
        $stockHistory = StockHistory::findOrFail($id);

        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,_pid',
            'action_type' => 'required|string',
            'quantity_changed' => 'required|integer',
            'last_quantity' => 'required|integer',
            'current_quantity' => 'required|integer',
        ]);

        $stockHistory->update($validatedData);
        return redirect()->route('stock_histories.index')->with('success', 'Stock history record updated successfully.');
    }

    // Delete a stock history record
    public function destroy($id)
    {
        $stockHistory = StockHistory::findOrFail($id);
        $stockHistory->delete();
        return redirect()->route('stock_histories.index')->with('success', 'Stock history record deleted successfully.');
    }
}
