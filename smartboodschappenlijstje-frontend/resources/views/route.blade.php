<x-app-layout>
    <main class="route-page">
        <header class="route-header">
            <div>
                <span class="page-kicker">Route voor {{ $list?->name ?? 'je lijst' }}</span>
                <h1>Voorgestelde route</h1>
                <p>De slimste volgorde om jouw supermarkten te bezoeken.</p>
            </div>

            <label class="gas-toggle">
                <input type="checkbox" disabled>
                Tankstations in de buurt
            </label>
        </header>

        @if($items->isEmpty())
            <section class="route-empty">
                <h2>Er is nog geen route</h2>
                <p>Voeg producten aan je actieve lijst toe om een winkelroute te maken.</p>
                <a href="{{ route('dashboard') }}">Producten toevoegen</a>
            </section>
        @else
            <section class="route-grid">
                <div class="route-left">
                    <div class="map-heading"><span>⌖</span> Kaartweergave</div>
                    <div class="route-card map-preview">
                        <div id="route-map" data-stops="{{ $routeStops->toJson() }}"></div>
                    </div>

                    <div class="route-card">
                        <div class="route-overview-title">
                            <span>↗</span>
                            <h2>Routeoverzicht</h2>
                        </div>

                        <div class="route-timeline">
                            <div class="route-step">
                                <div class="route-icon route-icon-dark">⌖</div>
                                <div class="route-step-card muted-card">
                                    <span>Thuis</span>
                                    <strong>Start · Jouw locatie</strong>
                                </div>
                            </div>

                            @foreach($stores as $storeName => $storeItems)
                                @php($subtotal = $storeItems->sum(fn ($item) => (float) $item->price * $item->quantity))
                                <div class="route-distance">
                                    <div class="route-line"></div>
                                    <span data-segment="{{ $loop->index }}">Afstand wordt berekend...</span>
                                </div>

                                <div class="route-step">
                                    <div class="route-icon route-icon-store">{{ strtoupper(substr($storeName, 0, 2)) }}</div>
                                    <div class="route-step-card">
                                        <div>
                                            <span>Stop {{ $loop->iteration }}</span>
                                            <strong>{{ $storeName }}</strong>
                                        </div>
                                        <div class="route-subtotal">
                                            <span>Subtotaal</span>
                                            <strong>&euro; {{ number_format($subtotal, 2, ',', '.') }}</strong>
                                        </div>
                                        <div class="route-products">
                                            @foreach($storeItems as $item)
                                                <span>{{ $item->name }} × {{ $item->quantity }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="route-distance">
                                <div class="route-line"></div>
                                <span data-segment="{{ $stores->count() }}">Afstand wordt berekend...</span>
                            </div>
                            <div class="route-step">
                                <div class="route-icon route-icon-end">⌖</div>
                                <div class="route-step-card muted-card">
                                    <span>Einde</span>
                                    <strong>Terug naar huis</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <aside class="route-right">
                    <div class="route-card">
                        <h2>Ritoverzicht</h2>
                        <div class="summary-row">
                            <span>Stops</span>
                            <strong>{{ $stores->count() }} supermarkten</strong>
                        </div>
                        <div class="summary-row">
                            <span>Totale afstand</span>
                            <strong id="total-distance">Wordt berekend...</strong>
                        </div>
                        <div class="summary-row">
                            <span>Geschatte tijd</span>
                            <strong id="total-time">Wordt berekend...</strong>
                        </div>
                    </div>

                    <div class="route-saving-card">
                        <span>Je besteedt</span>
                        <strong>&euro; {{ number_format($total, 2, ',', '.') }}</strong>
                        <p>Een besparing van &euro; {{ number_format($savings, 2, ',', '.') }} met deze winkelverdeling.</p>
                    </div>
                </aside>
            </section>
        @endif
    </main>

    @if($items->isNotEmpty())
        @vite('resources/js/route-map.js')
    @endif
</x-app-layout>
