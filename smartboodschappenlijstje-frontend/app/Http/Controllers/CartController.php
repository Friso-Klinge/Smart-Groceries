<?php

namespace App\Http\Controllers;

use App\Models\ShoppingListItem;
use App\Services\ActiveShoppingList;
use App\Services\ProductRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(
        Request $request,
        int $productId,
        ProductRepository $products,
        ActiveShoppingList $activeShoppingList
    ): RedirectResponse
    {
        $list = $activeShoppingList->get($request->user());

        if (! $list) {
            return redirect()->route('my-lists')
                ->with('list_message', 'Maak eerst een boodschappenlijstje aan.');
        }

        $product = $products->find($productId);

        abort_unless($product && $product['price'] !== null, 404);

        $item = $list->items()->firstOrNew(['product_id' => $productId]);
        $item->fill([
            'shopping_list_id' => $list->id,
            'product_id' => $product['id'],
            'name' => $product['name'],
            'brand' => $product['brand'],
            'image_url' => $product['image_url'],
            'price' => $product['price'],
            'highest_price' => $product['highest_price'],
            'supermarket_id' => $product['supermarket_id'],
            'supermarket_name' => $product['supermarket_name'],
            'quantity' => $item->exists ? $item->quantity + 1 : 1,
        ])->save();

        return back()->with('cart_message', $product['name'].' is toegevoegd aan '.$list->name.'.');
    }

    public function destroy(Request $request, ShoppingListItem $item): RedirectResponse
    {
        abort_unless($item->shoppingList->user_id === $request->user()->id, 404);
        $item->delete();

        return back()->with('cart_message', 'Product is verwijderd uit je boodschappenlijst.');
    }
}
