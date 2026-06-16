<?php

namespace App\Http\Controllers;

use App\Services\ActiveShoppingList;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ResultsController extends Controller
{
    public function __invoke(Request $request, ActiveShoppingList $activeShoppingList): View
    {
        $list = $activeShoppingList->get($request->user());
        $items = $list?->items()->orderBy('supermarket_name')->orderBy('name')->get() ?? collect();
        $stores = $items->groupBy(fn ($item) => $item->supermarket_name ?: 'Onbekende winkel');
        $total = $items->sum(fn ($item) => (float) $item->price * $item->quantity);
        $comparisonTotal = $items->sum(
            fn ($item) => (float) ($item->highest_price ?: $item->price) * $item->quantity
        );
        $savings = max(0, $comparisonTotal - $total);
        $savingPercentage = $comparisonTotal > 0 ? ($savings / $comparisonTotal) * 100 : 0;

        return view('results', compact(
            'list',
            'items',
            'stores',
            'total',
            'savings',
            'savingPercentage'
        ));
    }
}
