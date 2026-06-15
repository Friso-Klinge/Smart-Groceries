<x-app-layout>
    @vite(['resources/css/results.css'])

    <main class="results-page">
        <header class="results-header">
            <span class="page-kicker">Resultaten voor {{ $list?->name ?? 'je lijst' }}</span>
            <h1>Jouw slimme boodschappenplan</h1>
            <p>Hier zie je waar je ieder product voor de laagste prijs koopt.</p>
        </header>

        @if(session('cart_message'))
            <div class="results-message">{{ session('cart_message') }}</div>
        @endif

        @if($items->isEmpty())
            <section class="results-empty">
                <h2>Deze lijst is nog leeg</h2>
                <p>Voeg eerst producten toe voordat je het boodschappenplan bekijkt.</p>
                <a href="{{ route('dashboard') }}">Producten toevoegen</a>
            </section>
        @else
            <section class="results-stats">
                <article>
                    <span class="stat-icon">€</span>
                    <div>
                        <small>Totaal te besteden</small>
                        <strong>&euro; {{ number_format($total, 2, ',', '.') }}</strong>
                    </div>
                </article>
                <article>
                    <span class="stat-icon green">↓</span>
                    <div>
                        <small>Je bespaart</small>
                        <strong class="green-text">&euro; {{ number_format($savings, 2, ',', '.') }}</strong>
                    </div>
                </article>
                <article>
                    <span class="stat-icon green">%</span>
                    <div>
                        <small>Prijsverschil</small>
                        <strong class="green-text">{{ number_format($savingPercentage, 1, ',', '.') }}% goedkoper</strong>
                    </div>
                </article>
            </section>

            <section class="store-grid">
                @foreach($stores as $storeName => $storeItems)
                    @php($subtotal = $storeItems->sum(fn ($item) => (float) $item->price * $item->quantity))
                    <article class="store-card">
                        <header>
                            <div class="store-mark">{{ strtoupper(substr($storeName, 0, 2)) }}</div>
                            <div>
                                <h2>{{ $storeName }}</h2>
                                <p>{{ $storeItems->count() }} producten</p>
                            </div>
                            <div class="store-subtotal">
                                <span>Subtotaal</span>
                                <strong>&euro; {{ number_format($subtotal, 2, ',', '.') }}</strong>
                            </div>
                        </header>

                        @foreach($storeItems as $item)
                            <div class="result-item">
                                <div class="result-product-mark">{{ strtoupper(substr($item->brand ?: $item->name, 0, 2)) }}</div>
                                <div>
                                    <h3>{{ $item->name }}</h3>
                                    <p>&euro; {{ number_format((float) $item->price, 2, ',', '.') }} &times; {{ $item->quantity }}</p>
                                </div>
                                <strong>&euro; {{ number_format((float) $item->price * $item->quantity, 2, ',', '.') }}</strong>
                                <form method="POST" action="{{ route('cart.destroy', $item) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Verwijderen" aria-label="{{ $item->name }} verwijderen">×</button>
                                </form>
                            </div>
                        @endforeach
                    </article>
                @endforeach
            </section>

            <section class="route-cta">
                <div>
                    <strong>Klaar om boodschappen te doen?</strong>
                    <span>Bekijk de voorgestelde route langs {{ $stores->count() }} {{ $stores->count() === 1 ? 'winkel' : 'winkels' }}.</span>
                </div>
                <a href="{{ route('route') }}">Bekijk route <span>→</span></a>
            </section>
        @endif
    </main>
</x-app-layout>
