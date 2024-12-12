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
        return view('products.index');
    }

    public function getProducts(Request $request)
    {
        if ($request->ajax()) {
            $products = Products::select(['id', 'name', 'price', 'created_at', 'updated_at']);
            return Datatables::of($products)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>';
                    $btn .= '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function productsPage()
    {
        if (Auth::check()) {
            // return redirect()->route('products');
            return view('products');
        }
        return redirect()->route('signin');
    }

    public function     addProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Image validation
            'price' => 'required|numeric',
            'brand' => 'required|integer',
            'unit' => 'required|string',
        ]);

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('products', 'public'); // Store in 'storage/app/public/products'
        }
        $product = new Products();
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->img = $imagePath ?? null;
        $product->brand = $validatedData['brand'];
        $product->unit = $validatedData['unit'];
        $product->save();

        return response()->json('1');
    }
}
