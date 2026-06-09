<x-app-layout>
    <main class="route-page">

        <div class="route-header">
            <div>
                <h1>Route</h1>
                <p>Bekijk hier de beste route langs supermarkten en tankstations.</p>
            </div>

            <label class="gas-toggle">
                <input type="checkbox" disabled>
                Benzinepompen meenemen
            </label>
        </div>

        <section class="route-grid">
            <div class="route-left">

                <div class="route-card map-preview">
                    <h2>Kaart preview</h2>
                    <div id="route-map"></div>
                </div>

                <div class="route-card">
                    <div class="route-overview-title">
                        <span>⌁</span>
                        <h2>Route overzicht</h2>
                    </div>

                    <div class="route-timeline">

                        <div class="route-step">
                            <div class="route-icon route-icon-dark">⌖</div>
                            <div class="route-step-card muted-card">
                                <span>Thuis</span>
                                <strong>Start - Jouw locatie</strong>
                            </div>
                        </div>

                        <div class="route-distance">
                            <div class="route-line"></div>
                            <span id="distance-start-lidl">Afstand wordt berekend...</span>
                        </div>

                        <div class="route-step">
                            <div class="route-icon route-icon-lidl">LI</div>
                            <div class="route-step-card">
                                <div>
                                    <span>Stop 1</span>
                                    <strong>Lidl</strong>
                                </div>

                                <div class="route-subtotal">
                                    <span>Subtotaal</span>
                                    <strong>€ 1,79</strong>
                                </div>

                                <div class="route-products">
                                    <span>🥛 Melk</span>
                                    <span>🍞 Brood</span>
                                    <span>🥚 Eieren</span>
                                </div>
                            </div>
                        </div>

                        <div class="route-distance">
                            <div class="route-line"></div>
                            <span id="distance-lidl-aldi">Afstand wordt berekend...</span>
                        </div>

                        <div class="route-step">
                            <div class="route-icon route-icon-aldi">AL</div>
                            <div class="route-step-card">
                                <div>
                                    <span>Stop 2</span>
                                    <strong>Aldi</strong>
                                </div>

                                <div class="route-subtotal">
                                    <span>Subtotaal</span>
                                    <strong>€ 3,48</strong>
                                </div>

                                <div class="route-products">
                                    <span>🍝 Pasta</span>
                                    <span>🧀 Kaas</span>
                                </div>
                            </div>
                        </div>

                        <div class="route-distance">
                            <div class="route-line"></div>
                            <span id="distance-aldi-jumbo">Afstand wordt berekend...</span>
                        </div>

                        <div class="route-step">
                            <div class="route-icon route-icon-jumbo">JU</div>
                            <div class="route-step-card">
                                <div>
                                    <span>Stop 3</span>
                                    <strong>Jumbo</strong>
                                </div>

                                <div class="route-subtotal">
                                    <span>Subtotaal</span>
                                    <strong>€ 4,25</strong>
                                </div>

                                <div class="route-products">
                                    <span>🍎 Fruit</span>
                                    <span>🥤 Drinken</span>
                                </div>
                            </div>
                        </div>

                        <div class="route-distance">
                            <div class="route-line"></div>
                            <span id="distance-jumbo-home">Afstand wordt berekend...</span>
                        </div>

                        <div class="route-step">
                            <div class="route-icon route-icon-end">⌖</div>
                            <div class="route-step-card muted-card">
                                <span>Einde van route</span>
                                <strong>Terug naar huis</strong>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <aside class="route-right">
                <div class="route-card">
                    <h2>Samenvatting</h2>

                    <div class="summary-row">
                        <span>Aantal stops</span>
                        <strong id="total-stops">3 supermarkten</strong>
                    </div>

                    <div class="summary-row">
                        <span>Totale afstand</span>
                        <strong id="total-distance">Route wordt berekend...</strong>
                    </div>

                    <div class="summary-row">
                        <span>Geschatte tijd</span>
                        <strong id="total-time">Route wordt berekend...</strong>
                    </div>
                </div>

                <div class="route-saving-card">
                    <span>Je bespaart ongeveer</span>
                    <strong>€6,67</strong>
                    <p>Vergeleken met alles kopen bij één supermarkt.</p>
                </div>

                <div class="route-card">
                    <h2>Benzinepompen</h2>
                    <p class="muted">
                        Deze functie wordt later toegevoegd met een API.
                    </p>
                </div>
            </aside>
        </section>

    </main>

    @vite('resources/js/route-map.js')
</x-app-layout>