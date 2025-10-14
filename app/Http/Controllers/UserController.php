<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCard;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->user_type == 'user') {
            return view('dashboard');
        } elseif (Auth::check() && Auth::user()->user_type == 'admin') {
            return view('admin.dashboard');
        }
    }

    public function home()
    {
        $products = Product::latest()->take(2)->get();
        return view('index', compact('products'));
    }

    public function productDetails(Product $product)
    {

        return view('product_details', compact('product'));
    }

    public function allProducts()
    {
        $products = Product::all();

        return view('all_products', compact('products'));
    }

    public function addToCard($id)
    {
        $product_card = new ProductCard();
        $product_card->user_id = \auth()->id();
        $product_card->product_id = $id;
        $product_card->save();

        return redirect()->back()->with('card_message', 'Product added to the card');
    }
}
