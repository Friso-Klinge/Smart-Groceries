<x-app-layout>
    <main class="my-lists-page">
        <header class="my-lists-header">
            <div>
                <span class="page-kicker">Boodschappenlijsten</span>
                <h1>Mijn lijstjes</h1>
                <p>Maak meerdere lijstjes en kies aan welke lijst je producten wilt toevoegen.</p>
            </div>

            <form method="POST" action="{{ route('shopping-lists.store') }}" class="new-list-form">
                @csrf
                <input type="text" name="name" maxlength="80" placeholder="Naam van je lijstje" aria-label="Naam van je lijstje">
                <button class="new-list-button" type="submit" title="Nieuw boodschappenlijstje">
                    <span aria-hidden="true">+</span>
                    Nieuw lijstje
                </button>
            </form>
        </header>

        @if(session('list_message'))
            <div class="status-message">{{ session('list_message') }}</div>
        @endif

        <section class="lists-grid">
            @forelse($lists as $list)
                @php($isActive = $activeList?->id === $list->id)
                <article class="list-card {{ $isActive ? 'is-active' : '' }}">
                    <div class="list-card-top">
                        <div class="list-icon">{{ strtoupper(substr($list->name, 0, 2)) }}</div>
                        @if($isActive)
                            <span class="active-badge">Actief</span>
                        @endif
                    </div>

                    <div>
                        <h2>{{ $list->name }}</h2>
                        <p>{{ $list->items_count }} verschillende producten · {{ $list->total_quantity ?? 0 }} stuks</p>
                    </div>

                    <div class="list-card-actions">
                        <form method="POST" action="{{ route('shopping-lists.activate', $list) }}">
                            @csrf
                            <button class="use-list-button" type="submit">
                                {{ $isActive ? 'Producten toevoegen' : 'Deze lijst gebruiken' }}
                            </button>
                        </form>

                        <form method="POST" action="{{ route('shopping-lists.destroy', $list) }}">
                            @csrf
                            @method('DELETE')
                            <button class="delete-list-button" type="submit" title="Lijst verwijderen" aria-label="{{ $list->name }} verwijderen">×</button>
                        </form>
                    </div>
                </article>
            @empty
                <div class="empty-state">
                    <div class="empty-state-icon">+</div>
                    <h2>Nog geen lijstjes</h2>
                    <p>Gebruik de plusknop om je eerste boodschappenlijstje aan te maken.</p>
                </div>
            @endforelse
        </section>
    </main>
</x-app-layout>
