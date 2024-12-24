<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('category');
        }
        return redirect()->route('signin');
    }

    public function fetchAll()
    {
        $category = Category::all();
        $output = '';
        if ($category->count() > 0) {
            $output .= '<table class="table table-striped align-middle text-center">
        <thead>
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>';
            foreach ($category as $categories) {
                $output .= '<tr>
            <td>' . $categories->id . '</td>
            <td><img src="storage/images/' . $categories->img . '" width="50" class="img-thumbnail rounded-circle"></td>
            <td>' . $categories->name . '</td>
            <td>
                <a href="#" id="' . $categories->id . '" class="btn btn-info btn-sm editIcon" data-bs-toggle="modal" data-bs-target="#editCategoryModal">Edit</a>
                <a href="#" id="' . $categories->id . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</a>
                </td>
                </tr>';
            }
            $output .= '</tbody>
            </table>';
        } else {
            $output .= '<p>No Categories Found.</p>';
        }
        return $output;
    }

    // Insert New Category Ajax Request
    public function store(Request $request)
    {
        $file = $request->file('img');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $fileName);
        $categoryData = [
            'name' => $request->name,
            'img' => $fileName
        ];
        Category::create($categoryData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // Edit Category Ajax Request
    public function edit(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        return response()->json($category);
    }

    // Update an Category Ajax Request
    public function update(Request $request)
    {
        $fileName = '';
        $category = Category::find($request->category_id);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            if ($category->avatar) {
                Storage::delete('public/images/' . $category->avatar);
            }
        } else {
            $fileName = $request->category_avatar;
        }
        $categoryData = ['first_name' => $request->fname, 'last_name' => $request->lname, 'email' => $request->email, 'avatar' => $fileName];
        $category->update($categoryData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // Delete an Category Ajax Request
    public function delete(Request $request)
    {
        $id = $request->id;
        $emp = Category::find($id);
        if (Storage::delete('public/images/' . $emp->avatar)) {
            Category::destroy($id);
        }
    }
}
