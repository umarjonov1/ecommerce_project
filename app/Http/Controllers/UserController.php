<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCard;
use Illuminate\Http\Request;
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

    public function addToCart($id)
    {
        $product_card = new ProductCard();
        $product_card->user_id = \auth()->id();
        $product_card->product_id = $id;
        $product_card->save();

        return redirect()->back()->with('cart_message', 'Product added to the card');
    }

    public function cartProducts()
    {
        $cartItems = ProductCard::where('user_id', auth()->id())->get();

        return view('view_cart_products', compact('cartItems'));
    }

    public function removeCartProduct(ProductCard $productCard)
    {
        $productCard->delete();
        return redirect()->back();
    }

    public function confirmOrder(Request $request)
    {
        // 1. Валидация данных, пришедших из формы
        $validatedData = $request->validate([
            'receiver_address' => 'required|string|max:255',
            'receiver_phone' => 'required|string|max:30',
        ]);

        $user_id = Auth::id();
        $cart_products = ProductCard::where('user_id', $user_id)->get();

        // 2. Проверяем, не пуста ли корзина
        if ($cart_products->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // 3. Перебираем каждый товар в корзине
        foreach ($cart_products as $cart_item) {

            // 4. Создаем НОВЫЙ объект Order ВНУТРИ цикла
            $order = new Order();

            // 5. Заполняем данными из формы (которые мы провалидировали)
            $order->receiver_address = $validatedData['receiver_address'];
            $order->receiver_phone = $validatedData['receiver_phone'];

            // 6. Заполняем ID пользователя
            $order->user_id = $user_id;

            // 7. Заполняем ID продукта
            //    (ВАЖНО: Убедитесь, что $cart_item->product_id существует.
            //    Если модель ProductCard - это и есть сам продукт, тогда $cart_item->id)
            $order->product_id = $cart_item->product_id; // <-- Скорее всего, вам нужно это

            // 8. Сохраняем НОВЫЙ заказ в базу
            $order->save();
        }

        // 9. (Рекомендуется) Очистить корзину пользователя после успешного заказа
        ProductCard::where('user_id', $user_id)->delete();

        return redirect()->back()->with('confirm_order', 'Order Confirmed');
    }

    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())->get();

        return view('view_my_orders', compact('orders'));
    }
}
