<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addCategory()
    {

        return view('admin.add-category');
    }

    public function postAddCategory(Request $request)
    {
        $category = new Category();
        $category->category = $request->category;
        $category->save();

        return redirect()->back()->with('category_message', 'Category added successfully!');
    }

    public function viewCategory() {
        $categories = Category::all();
        return view('admin.view-category', compact('categories'));
    }

    public function deleteCategory(Category $category) {
        $category->delete();

        return redirect()->back()->with('delete_message', 'Category was deleted successfully!');
    }

    public function editCategory(Category $category) {

        return view('admin.edit-category', compact('category'));
    }

    public function updateCategory(Category $category, Request $request)
    {
        $category->category = $request->category;
        $category->update();

        return redirect()->back()->with('category_updated_message', 'Category added successfully!');
    }
}
