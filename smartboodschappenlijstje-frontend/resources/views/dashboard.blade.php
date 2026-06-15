<x-app-layout>
    @vite(['resources/css/dashboard.css'])

    <div class="dashboard-page" x-data="{ search: '', brand: 'all' }">
        <section class="dashboard-hero">
            <div>
                <h1>Producten</h1>
                <p>
                    @if($activeList)
                        Je voegt producten toe aan <strong>{{ $activeList->name }}</strong>.
                    @else
                        Maak eerst een boodschappenlijstje aan om producten toe te voegen.
                    @endif
                </p>
            </div>

            <div class="hero-stats">
                <span>{{ $products->count() }} producten</span>
                <span>{{ $brands->count() }} merken</span>
            </div>
        </section>

        @if(session('cart_message'))
            <div class="status-message">{{ session('cart_message') }}</div>
        @endif

        @if($loadError)
            <div class="error-message">{{ $loadError }}</div>
        @endif

        <section class="filter-bar">
            <input x-model="search" type="search" placeholder="Zoek op product of merk..." aria-label="Producten zoeken">

            <div class="category-tabs">
                <button type="button" :class="{ active: brand === 'all' }" @click="brand = 'all'">Alles</button>
                @foreach($brands as $brand)
                    <button
                        type="button"
                        :class="{ active: brand === @js($brand) }"
                        @click="brand = @js($brand)"
                    >{{ $brand }}</button>
                @endforeach
            </div>
        </section>

        @php
            $deals = $products
                ->filter(fn ($product) => $product['price'] !== null)
                ->sortByDesc(fn ($product) => ($product['highest_price'] ?? $product['price']) - $product['price'])
                ->take(4);
        @endphp

        @if($deals->isNotEmpty())
            <section class="deals-section">
                <div class="section-title">
                    <div class="section-icon">%</div>
                    <div>
                        <h2>Beste prijzen</h2>
                        <p>Producten met het grootste prijsverschil</p>
                    </div>
                </div>

                <div class="deals-grid">
                    @foreach($deals as $product)
                        @php
                            $discount = $product['highest_price'] > $product['price']
                                ? round((1 - $product['price'] / $product['highest_price']) * 100)
                                : 0;
                        @endphp
                        <article class="deal-card">
                            @if($discount > 0)
                                <span class="discount">-{{ $discount }}%</span>
                            @endif

                            <div class="deal-image">
                                @if($product['image_url'])
                                    <img src="{{ $product['image_url'] }}" alt="{{ $product['name'] }}">
                                @else
                                    <span>{{ strtoupper(substr($product['brand'], 0, 2)) }}</span>
                                @endif
                            </div>

                            <span class="tag">{{ $product['brand'] }}</span>
                            <h3>{{ $product['name'] }}</h3>
                            <p class="store-name">{{ $product['supermarket_name'] ?? 'Geen supermarkt' }}</p>

                            <p class="price">
                                &euro; {{ number_format($product['price'], 2, ',', '.') }}
                                @if($discount > 0)
                                    <small>&euro; {{ number_format($product['highest_price'], 2, ',', '.') }}</small>
                                @endif
                            </p>

                            <form method="POST" action="{{ route('cart.store', $product['id']) }}">
                                @csrf
                                <button class="small-add" type="submit" title="Toevoegen aan winkelmandje" aria-label="{{ $product['name'] }} toevoegen">+</button>
                            </form>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        <section class="product-section">
            <div class="category-header">
                <h2>Alle producten</h2>
                <span>{{ $products->count() }}</span>
            </div>

            <div class="product-grid">
                @forelse($products as $product)
                    <article
                        class="product-row"
                        x-show="(brand === 'all' || brand === @js($product['brand'])) && (@js(strtolower($product['name'].' '.$product['brand'])).includes(search.toLowerCase()))"
                    >
                        <div class="product-icon">
                            @if($product['image_url'])
                                <img src="{{ $product['image_url'] }}" alt="">
                            @else
                                {{ strtoupper(substr($product['brand'], 0, 2)) }}
                            @endif
                        </div>

                        <div class="product-info">
                            <span class="product-brand">{{ $product['brand'] }}</span>
                            <h3>{{ $product['name'] }}</h3>
                            @if($product['price'] !== null)
                                <p>
                                    vanaf <strong>&euro; {{ number_format($product['price'], 2, ',', '.') }}</strong>
                                    <span class="store">{{ $product['supermarket_name'] }}</span>
                                </p>
                            @else
                                <p>Nog geen prijs beschikbaar</p>
                            @endif
                        </div>

                        @if($product['price'] !== null)
                            <form method="POST" action="{{ route('cart.store', $product['id']) }}">
                                @csrf
                                <button class="add-button" type="submit" title="Toevoegen aan winkelmandje" aria-label="{{ $product['name'] }} toevoegen">+</button>
                            </form>
                        @endif
                    </article>
                @empty
                    @unless($loadError)
                        <div class="empty-category">Er staan nog geen producten in de database.</div>
                    @endunless
                @endforelse
            </div>
        </section>

        <a class="view-list-button" href="{{ $activeList ? route('results') : route('my-lists') }}">
            {{ $activeList ? 'Verder naar Results' : 'Lijst aanmaken' }} <span>{{ $cartCount }}</span>
        </a>
    </div>
</x-app-layout>
