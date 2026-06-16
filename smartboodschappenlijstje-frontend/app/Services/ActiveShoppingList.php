<?php

namespace App\Services;

use App\Models\ShoppingList;
use App\Models\User;

class ActiveShoppingList
{
    public function get(User $user): ?ShoppingList
    {
        $activeId = session('active_shopping_list_id');

        $list = $activeId
            ? $user->shoppingLists()->find($activeId)
            : null;

        if (! $list) {
            $list = $user->shoppingLists()->latest()->first();
        }

        if ($list) {
            session(['active_shopping_list_id' => $list->id]);
        }

        return $list;
    }

    public function set(ShoppingList $list): void
    {
        session(['active_shopping_list_id' => $list->id]);
    }
}
