<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DataTables;

class ProductsController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('products');
        }
        return redirect()->route('signin');
    }

    // public function fetchAll(Request $request)
    // {
    //     // Use pagination to handle large datasets
    //     $products = Products::paginate(10);
    //     // Format the paginated data for DataTables
    //     $formattedProducts = $products->map(function ($product) {
    //         return [
    //             'name' => $product->name,
    //             'price' => $product->price,
    //             'brand' => $product->brand,
    //             'img' => '<img src="' . asset('storage/' . $product->img) . '" alt="' . $product->name . '" width="50">',
    //             'unit' => $product->unit,
    //             'category' => $product->category,
    //             'created_at' => $product->created_at->format('Y-m-d'),
    //             'updated_at' => $product->updated_at->format('Y-m-d'),
    //             'action' => '<button class="btn btn-info">Edit</button>
    //             <button class="btn btn-danger">Delete</button>',
    //         ];
    //     });
    //     // Return paginated data in DataTables format
    //     return response()->json([
    //         'data' => $formattedProducts,
    //         'current_page' => $products->currentPage(),
    //         'last_page' => $products->lastPage(),
    //         'per_page' => $products->perPage(),
    //         'total' => $products->total(),
    //     ]);
    // }

    public function productsPage()
    {
        if (Auth::check()) {
            return view('products');
        }
        return redirect()->route('signin');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|numeric',
            'brand' => 'required|string',
            'category' => 'required|string',
            'unit' => 'required|string',
        ]);
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store();
        }
        $product = new Products();
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->img = $imagePath ?? null;
        $product->brand = $validatedData['brand'];
        $product->category = $validatedData['category'];
        $product->unit = $validatedData['unit'];
        $product->save();
        return response()->json('1');
    }

    public function fetchAll()
    {
        $products = Products::all();
        return response()->json($products);
    }

    // Update Product
    public function updateProduct(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|numeric',
            'brand' => 'required|string',
            'category' => 'required|string',
            'unit' => 'required|string',
        ]);
        $product = Products::findOrFail($id);
        if ($request->hasFile('img')) {
            // Store the new image and delete the old one if it exists
            if ($product->img && file_exists(storage_path('app/public/' . $product->img))) {
                unlink(storage_path('app/public/' . $product->img));
            }
            $imagePath = $request->file('img')->store('products', 'public');
            $product->img = $imagePath;
        }
        // Update the product fields
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->brand = $validatedData['brand'];
        $product->category = $validatedData['category'];
        $product->unit = $validatedData['unit'];
        $product->save();
        return response()->json(['success' => true, 'message' => 'Product updated successfully!']);
    }

    // Delete Product
    public function deleteProduct($id)
    {
        $product = Products::findOrFail($id);
        // Check if the product has an image and delete it from storage
        if ($product->img && file_exists(storage_path('app/public/' . $product->img))) {
            unlink(storage_path('app/public/' . $product->img));
        }
        // Delete the product record
        $product->delete();
        return response()->json(['success' => true, 'message' => 'Product deleted successfully!']);
    }
}