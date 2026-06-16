<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use App\Services\ActiveShoppingList;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShoppingListController extends Controller
{
    public function index(Request $request, ActiveShoppingList $activeShoppingList): View
    {
        $lists = $request->user()
            ->shoppingLists()
            ->withCount('items')
            ->withSum('items as total_quantity', 'quantity')
            ->latest()
            ->get();

        $activeList = $activeShoppingList->get($request->user());

        return view('my-lists', compact('lists', 'activeList'));
    }

    public function store(Request $request, ActiveShoppingList $activeShoppingList): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['nullable', 'string', 'max:80'],
        ]);

        $listNumber = $request->user()->shoppingLists()->count() + 1;
        $list = $request->user()->shoppingLists()->create([
            'name' => ($data['name'] ?? null) ?: 'Boodschappenlijst '.$listNumber,
        ]);

        $activeShoppingList->set($list);

        return redirect()->route('dashboard')
            ->with('cart_message', $list->name.' is aangemaakt. Voeg nu producten toe.');
    }

    public function activate(
        Request $request,
        ShoppingList $shoppingList,
        ActiveShoppingList $activeShoppingList
    ): RedirectResponse {
        $this->authorizeList($request, $shoppingList);
        $activeShoppingList->set($shoppingList);

        return redirect()->route('dashboard')
            ->with('cart_message', $shoppingList->name.' is nu actief.');
    }

    public function destroy(Request $request, ShoppingList $shoppingList): RedirectResponse
    {
        $this->authorizeList($request, $shoppingList);
        $shoppingList->delete();

        if ((int) session('active_shopping_list_id') === $shoppingList->id) {
            session()->forget('active_shopping_list_id');
        }

        return back()->with('list_message', 'Het boodschappenlijstje is verwijderd.');
    }

    private function authorizeList(Request $request, ShoppingList $shoppingList): void
    {
        abort_unless($shoppingList->user_id === $request->user()->id, 404);
    }
}
