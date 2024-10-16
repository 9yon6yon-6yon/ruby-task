<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\StockHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function AdminLogin()
    {
        return view('admin.login');
    }
    // List all products with their inventory and stock histories for authenticated user
    public function listProducts()
    {
        $products = Product::where('_userid', Auth::id())->with('inventory', 'stockHistories', 'images')->get();
        return view('admin.products', compact('products'));
    }
    public function viewProductForm()
    {
        $categories = Category::all();
        return view('admin.addproduct', compact('categories'));
    }
    public function ProductStore(Request $request)
    {

        $validated = $request->validate([
            'sku' => 'required|string|unique:products,sku|max:255',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'images' => 'nullable|array|max:4096',
            'images.*' => 'nullable|max:4096', // Allow multiple images

        ]);

        $product = new Product();
        $product->_userid = Auth::id();
        $product->name = $validated['name'];
        $product->sku = $validated['sku'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->category_id = $request->input('category_id');
        $product->save();


        // Create inventory for the product
        $inventory = new Inventory();
        $inventory->_puid = $product->_pid;
        $inventory->available_quantity = $request->input('available_quantity');
        $inventory->save();

        // Create stock history for the product
        $stockHistory = new StockHistory();
        $stockHistory->product_id = $product->_pid;
        $stockHistory->action_type = 'Added';
        $stockHistory->quantity_changed = 0;
        $stockHistory->last_quantity = 0;
        $stockHistory->current_quantity = $request->input('available_quantity');
        $stockHistory->save();


        if ($request->hasFile('images')) {
            //loop through all images and store them in database
            foreach ($request->file('images') as $image) {
                // Define the directory path
                $uploadPath = public_path('uploads/productImages');

                // Ensuring the directory exists, create if not
                if (!File::exists($uploadPath)) {
                    File::makeDirectory($uploadPath, 0755, true, true);
                }
                // Generate a unique filename for the image
                $imageName = time() . '_' . uniqid() . '.' . 'webp';

                // Resize the image and save it
                Image::make($image)->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode('webp', 60)->save($uploadPath . '/' . $imageName);

                // Save the image path in the database
                ProductImage::create([
                    'product_id' => $product->_pid,
                    'image_path' => 'uploads/productImages/' . $imageName,
                ]);
            }
        }
        return redirect()->route('admin.listproducts')->with('success', 'Product created successfully.');
    }

    public function ProductView($id)
    {
        $product = Product::with('inventory', 'stockHistories', 'images')->findOrFail($id);
        return view('admin.productdetails', compact('product'));
    }
    // Show a form to edit an existing product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Update the product in the database
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'sku' => 'required|unique:products,sku,' . $id . ',_pid', // Ignore current product's SKU
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'inventory_id' => 'required|exists:inventories,id',
        ]);

        $product->update($validatedData);
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        // Retrieve associated images and delete them from the folder
        $productImages = $product->images;

        foreach ($productImages as $image) {
            $imagePath = public_path($image->image_path);

            // Check if the file exists before deleting
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // Optionally, delete the image record from the database
            $image->delete();
        }

        $product->delete();
        return redirect()->route('admin.listproducts')->with('success', 'Product deleted successfully.');
    }
}
