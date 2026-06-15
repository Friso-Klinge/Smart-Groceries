<?php

namespace App\Http\Controllers;

use App\Services\ActiveShoppingList;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RouteController extends Controller
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

        $knownCoordinates = [
            'Albert Heijn' => ['lat' => 52.7284, 'lng' => 6.4907],
            'Jumbo' => ['lat' => 52.7249, 'lng' => 6.4766],
            'PLUS' => ['lat' => 52.7169, 'lng' => 6.4828],
            'Lidl' => ['lat' => 52.7218, 'lng' => 6.4706],
            'Aldi' => ['lat' => 52.7302, 'lng' => 6.4811],
        ];

        $routeStops = $stores->keys()->values()->map(function (string $name, int $index) use ($knownCoordinates) {
            return [
                'name' => $name,
                'lat' => $knownCoordinates[$name]['lat'] ?? 52.7250 + ($index * 0.004),
                'lng' => $knownCoordinates[$name]['lng'] ?? 6.4800 + ($index * 0.004),
            ];
        });

        return view('route', compact('list', 'items', 'stores', 'total', 'savings', 'routeStops'));
    }
}
