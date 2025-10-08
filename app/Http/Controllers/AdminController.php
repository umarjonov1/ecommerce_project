<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function addCategory()
    {

        return view('admin.category.add-category');
    }

    public function postAddCategory(Request $request)
    {
        $category = new Category();
        $category->category = $request->category;
        $category->save();

        return redirect()->back()->with('category_message', 'Category added successfully!');
    }

    public function viewCategory()
    {
        $categories = Category::all();
        return view('admin.category.view-category', compact('categories'));
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('delete_message', 'Category was deleted successfully!');
    }

    public function editCategory(Category $category)
    {

        return view('admin.category.edit-category', compact('category'));
    }

    public function updateCategory(Category $category, Request $request)
    {
        $category->category = $request->category;
        $category->update();

        return redirect()->back()->with('category_updated_message', 'Category added successfully!');
    }

    public function addProduct()
    {
        $categories = Category::all();
        return view('admin.product.add-product', compact('categories'));
    }

    public function PostAddProduct(Request $request)
    {
        $this->validateProductRole($request);

        $product = new Product();

        $this->storeProduct($request, $product);

        return redirect()->back()->with('product_message', 'Product added successfully!');
    }

    public function viewProduct()
    {
        $products = Product::paginate(10);
        return view('admin.product.view-product', compact('products'));
    }

    public function deleteProduct(Product $product)
    {
        if ($product->product_image) {
            unlink(public_path('products/' . $product->product_image));
        }
        $product->delete();

        return redirect()->back()->with('delete_message', 'Product has been deleted!');
    }

    public function editProduct(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit-product', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $this->validateProductRole($request);
        $this->storeProduct($request, $product);

        return redirect()->back()->with('product_updated_message', 'Product updated successfully!');

    }


    private function validateProductRole($request)
    {
        $request->validate([
            'product_title' => 'required|string',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|numeric',
            'product_category' => 'required|string',
            'product_image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }

    private function storeProduct($request, $product)
    {
        $product->fill($request->except('product_image'));

        if ($request->hasFile('product_image')) {

            // 2. Сохраняем имя старого файла в отдельную переменную
            $oldImage = $product->product_image;

            // 3. Сохраняем новый файл в storage/app/public/products
            // Laravel сам сгенерирует уникальное имя
            $path = $request->file('product_image')->store('products', 'public');

            // 4. Записываем имя НОВОГО файла в модель
            // basename($path) извлечет имя файла из полного пути (например, 'products/image.jpg' -> 'image.jpg')
            $product->product_image = basename($path);

            // 5. Если старое имя файла существует, УДАЛЯЕМ СТАРЫЙ ФАЙЛ
            if ($oldImage) {
                Storage::disk('public')->delete('products/' . $oldImage);
            }
        }

        $product->save();
    }
}
