<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.category', compact('categories'));
    }
    public function AddCategory()
    {
        return view('admin.addcategory');
    }
    public function StoreCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            // Define the directory path
            $uploadPath = public_path('uploads/categoryImages');

            // Ensure the directory exists, if not, create it
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $imageName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

            // Move the image to the specified directory
            $request->file('image')->move($uploadPath, $imageName);
        }

        // Create the category in the database
        Category::create([
            'category_name' => $request->input('category_name'),
            'category_slug' => Str::slug(str_replace(' ', '-', $request->input('category_slug'))),
            'image' => $imageName,
        ]);

        return redirect()->back()->with('success', 'Category created successfully.');
    }
}
