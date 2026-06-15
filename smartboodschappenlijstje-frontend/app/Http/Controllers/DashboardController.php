<?php

namespace App\Http\Controllers;

use App\Services\ProductRepository;
use App\Services\ActiveShoppingList;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

class DashboardController extends Controller
{
    public function __invoke(
        Request $request,
        ProductRepository $productRepository,
        ActiveShoppingList $activeShoppingList
    ): View
    {
        try {
            $products = $productRepository->all();
            $loadError = null;
        } catch (Throwable $exception) {
            report($exception);
            $products = collect();
            $loadError = 'De producten konden niet uit de database worden geladen.';
        }

        $brands = $products->pluck('brand')->filter()->unique()->sort()->values();
        $activeList = $activeShoppingList->get($request->user());
        $cartCount = $activeList?->items()->sum('quantity') ?? 0;

        return view('dashboard', compact('products', 'brands', 'cartCount', 'loadError', 'activeList'));
    }
}
