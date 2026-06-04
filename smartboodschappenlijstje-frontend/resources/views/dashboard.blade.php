<x-app-layout>
    @vite(['resources/css/dashboard.css'])

    @php
        $products = $products ?? collect();
        $categories = $categories ?? collect();

        if ($products->isEmpty()) {
            $products = collect([
                (object)[
                    'name' => 'Milk',
                    'price' => 1.29,
                    'old_price' => 1.79,
                    'discount' => 25,
                    'emoji' => '🥛',
                    'category_id' => 1,
                ],
                (object)[
                    'name' => 'Bread',
                    'price' => 1.49,
                    'old_price' => 1.99,
                    'discount' => 20,
                    'emoji' => '🍞',
                    'category_id' => 2,
                ],
                (object)[
                    'name' => 'Bananas',
                    'price' => 1.19,
                    'old_price' => 1.69,
                    'discount' => 30,
                    'emoji' => '🍌',
                    'category_id' => 3,
                ],
                (object)[
                    'name' => 'Tomatoes',
                    'price' => 1.89,
                    'old_price' => 2.49,
                    'discount' => 15,
                    'emoji' => '🍅',
                    'category_id' => 4,
                ],
            ]);
        }

        if ($categories->isEmpty()) {
            $categories = collect([
                (object)['id' => 1, 'name' => 'Dairy'],
                (object)['id' => 2, 'name' => 'Bakery'],
                (object)['id' => 3, 'name' => 'Fruit'],
                (object)['id' => 4, 'name' => 'Vegetables'],
            ]);
        }
    @endphp

    <div class="dashboard-page">

        <section class="dashboard-hero">
            <div>
                <h1>Browse products</h1>
                <p>Discover deals and add items — we’ll plan the cheapest route.</p>
            </div>

            <div class="hero-stats">
                <span>{{ $products->count() }} products</span>
                <span>{{ $categories->count() }} categories</span>
            </div>
        </section>

        <section class="filter-bar">
            <input type="text" placeholder="Search products...">

            <div class="category-tabs">
                <button class="active">All</button>

                @foreach($categories as $category)
                    <button>{{ $category->name }}</button>
                @endforeach
            </div>
        </section>

        <section class="deals-section">
            <div class="section-title">
                <div class="icon">🔥</div>
                <div>
                    <h2>Today's best deals</h2>
                    <p>Biggest price gaps across stores</p>
                </div>
            </div>

            <div class="deals-grid">
                @forelse($products->take(4) as $product)
                    <div class="deal-card">
                        <span class="discount">-{{ $product->discount ?? 20 }}%</span>

                        <div class="deal-image">
                            {{ $product->emoji ?? '🛒' }}
                        </div>

                        <span class="tag">Product</span>

                        <h3>{{ $product->name }}</h3>

                        <p class="price">
                            € {{ number_format($product->price, 2, ',', '.') }}
                            <small>
                                € {{ number_format($product->old_price ?? ($product->price + 1), 2, ',', '.') }}
                            </small>
                        </p>

                        <button class="small-add">+</button>
                    </div>
                @empty
                    <div class="placeholder-card">
                        <div class="placeholder-icon">🛒</div>
                        <h3>No products yet</h3>
                        <p>Products will appear here once they are added.</p>
                    </div>
                @endforelse
            </div>
        </section>

        @foreach($categories as $category)
            @php
                $categoryProducts = $products->where('category_id', $category->id);
            @endphp

            <section class="product-section">
                <div class="category-header">
                    <h2>{{ $category->name }}</h2>
                    <span>{{ $categoryProducts->count() }}</span>
                </div>

                <div class="product-grid">
                    @forelse($categoryProducts as $product)
                        <div class="product-row">
                            <div class="product-icon">
                                {{ $product->emoji ?? '🛒' }}
                            </div>

                            <div class="product-info">
                                <h3>{{ $product->name }}</h3>
                                <p>
                                    from
                                    <strong>€ {{ number_format($product->price, 2, ',', '.') }}</strong>
                                    <span class="store">AL</span>
                                </p>
                            </div>

                            <button class="add-button">+</button>
                        </div>
                    @empty
                        <div class="empty-category">
                            No products in this category yet.
                        </div>
                    @endforelse
                </div>
            </section>
        @endforeach

        <button class="view-list-button">
            🛒 View list <span>0</span>
        </button>

    </div>
</x-app-layout>