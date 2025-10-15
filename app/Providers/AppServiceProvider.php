<?php

namespace App\Providers;

use App\Models\ProductCard;
use Illuminate\Pagination\Paginator as Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Используем замыкание (функцию) для View::share.
        // Это более производительно, так как код выполнится только тогда,
        // когда шаблон будет рендериться.
        View::composer('*', function ($view) {
            $cartsCount = 0;
            if (Auth::check()) {
                // Получаем ID авторизованного пользователя
                $user_id = Auth::id();
                // Считаем товары
                $cartsCount = ProductCard::where('user_id', $user_id)->count();
            }
            // Передаем переменную $cartCount во все шаблоны
            $view->with('cartsCount', $cartsCount);
        });
    }
}
