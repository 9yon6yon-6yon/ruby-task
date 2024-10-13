<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    // List all inventories
    public function index()
    {
        $inventories = Inventory::with('product')->get();
        return view('inventory.index', compact('inventories'));
    }

    // Show form to create a new inventory
    public function create()
    {
        return view('inventory.create');
    }

    // Store a newly created inventory in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            '_puid' => 'required|ulid',
            'available_quantity' => 'required|integer',
        ]);

        Inventory::create($validatedData);
        return redirect()->route('inventory.index')->with('success', 'Inventory created successfully.');
    }

    // Show a specific inventory record
    public function show($id)
    {
        $inventory = Inventory::with('product')->findOrFail($id);
        return view('inventory.show', compact('inventory'));
    }

    // Show form to edit an inventory
    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventory.edit', compact('inventory'));
    }

    // Update an existing inventory
    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);

        $validatedData = $request->validate([
            '_puid' => 'required|ulid',
            'available_quantity' => 'required|integer',
        ]);

        $inventory->update($validatedData);
        return redirect()->route('inventory.index')->with('success', 'Inventory updated successfully.');
    }

    // Delete an inventory record
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
        return redirect()->route('inventory.index')->with('success', 'Inventory deleted successfully.');
    }
}
