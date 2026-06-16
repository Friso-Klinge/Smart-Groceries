<?php

namespace Tests\Feature;

use App\Models\ShoppingList;
use App\Models\User;
use App\Services\ProductRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShoppingListFlowTest extends TestCase
{
    use RefreshDatabase;

    private array $product = [
        'id' => 1,
        'barcode' => '8712423012345',
        'name' => 'Coca-Cola Zero 1.5L',
        'brand' => 'Coca-Cola',
        'image_url' => null,
        'price' => 2.49,
        'highest_price' => 2.69,
        'supermarket_id' => 1,
        'supermarket_name' => 'Jumbo',
    ];

    public function test_user_can_create_multiple_lists_and_select_one(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('shopping-lists.store'), ['name' => 'Weekboodschappen'])
            ->assertRedirect(route('dashboard'));

        $this->actingAs($user)
            ->post(route('shopping-lists.store'), ['name' => 'Feest'])
            ->assertRedirect(route('dashboard'));

        $weekList = $user->shoppingLists()->where('name', 'Weekboodschappen')->firstOrFail();

        $this->actingAs($user)
            ->post(route('shopping-lists.activate', $weekList))
            ->assertRedirect(route('dashboard'))
            ->assertSessionHas('active_shopping_list_id', $weekList->id);

        $this->assertDatabaseCount('shopping_lists', 2);
    }

    public function test_product_is_added_to_active_list_and_results_page(): void
    {
        $user = User::factory()->create();
        $list = ShoppingList::create(['user_id' => $user->id, 'name' => 'Weekboodschappen']);

        $this->mock(ProductRepository::class)
            ->shouldReceive('find')
            ->twice()
            ->with(1)
            ->andReturn($this->product);

        $this->actingAs($user)
            ->withSession(['active_shopping_list_id' => $list->id])
            ->post(route('cart.store', 1))
            ->assertRedirect();

        $this->actingAs($user)
            ->withSession(['active_shopping_list_id' => $list->id])
            ->post(route('cart.store', 1))
            ->assertRedirect();

        $this->assertDatabaseHas('shopping_list_items', [
            'shopping_list_id' => $list->id,
            'product_id' => 1,
            'quantity' => 2,
        ]);

        $this->actingAs($user)
            ->withSession(['active_shopping_list_id' => $list->id])
            ->get(route('results'))
            ->assertOk()
            ->assertSee('Weekboodschappen')
            ->assertSee('Coca-Cola Zero 1.5L')
            ->assertSee('4,98')
            ->assertSee('Jumbo');
    }

    public function test_user_cannot_activate_another_users_list(): void
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();
        $list = ShoppingList::create(['user_id' => $owner->id, 'name' => 'Privé']);

        $this->actingAs($otherUser)
            ->post(route('shopping-lists.activate', $list))
            ->assertNotFound();
    }
}
