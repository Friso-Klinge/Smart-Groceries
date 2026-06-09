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
                    <h2>Route overzicht</h2>

                    <ol class="route-list">
                        <li>
                            <span class="route-dot start-dot"></span>
                            <div>
                                <strong>Start - Jouw locatie</strong>
                                <p>Thuis</p>
                            </div>
                        </li>

                        <li>
                            <span class="route-dot"></span>
                            <div>
                                <strong>Stop 1 - Lidl</strong>
                                <p>Melk, brood, eieren</p>
                            </div>
                        </li>

                        <li>
                            <span class="route-dot"></span>
                            <div>
                                <strong>Stop 2 - Aldi</strong>
                                <p>Pasta, kaas</p>
                            </div>
                        </li>

                        <li>
                            <span class="route-dot"></span>
                            <div>
                                <strong>Stop 3 - Jumbo</strong>
                                <p>Fruit, drinken</p>
                            </div>
                        </li>

                        <li>
                            <span class="route-dot end-dot"></span>
                            <div>
                                <strong>Terug naar huis</strong>
                                <p>Einde van de route</p>
                            </div>
                        </li>
                    </ol>
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