<header class="app-navbar">
    <div class="app-navbar-inner">
        <a href="{{ route('dashboard') }}" class="app-brand">
            <span class="app-logo">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M19.5 4.5c-6.7.2-11.2 2.3-13.4 6.2-1.2 2.2-.7 5 1.2 6.7 1.8 1.7 4.6 2 6.8.7 3.8-2.3 5.2-7 5.4-13.6Z"></path>
                    <path d="M5 20c1.7-4.5 4.7-7.6 9.3-9.5M6.8 14.5c1.2.2 2.5.7 3.5 1.5"></path>
                </svg>
            </span>

            <div>
                <div class="app-brand-title">Smart Groceries</div>
                <div class="app-brand-subtitle">Shop smart. Save more.</div>
            </div>
        </a>

        <nav class="app-nav">
            <a href="{{ route('dashboard') }}"
                class="app-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                List
            </a>

            <a href="{{ route('my-lists') }}" class="app-nav-link {{ request()->routeIs('my-lists') ? 'active' : '' }}">
                My lists
            </a>

            <a href="{{ route('results') }}" class="app-nav-link {{ request()->routeIs('results') ? 'active' : '' }}">
                Results
            </a>

            <a href="{{ route('route') }}" class="app-nav-link {{ request()->routeIs('route') ? 'active' : '' }}">
                Route
            </a>
        </nav>

        <div class="app-user-menu">
            <details>
                <summary class="app-user-button">
                    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                </summary>

                <div class="app-dropdown">
                    <div class="app-dropdown-user">
                        <p>{{ Auth::user()->name }}</p>
                        <span>{{ Auth::user()->email }}</span>
                    </div>

                    <hr>

                    <a href="{{ route('profile.edit') }}" class="app-dropdown-link">
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 15.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"></path>
                            <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-2.8 2.8-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.6v.2h-4V21a1.7 1.7 0 0 0-1-1.6 1.7 1.7 0 0 0-1.9.3l-.1.1L4.2 17l.1-.1a1.7 1.7 0 0 0 .3-1.9A1.7 1.7 0 0 0 3 14H2.8v-4H3a1.7 1.7 0 0 0 1.6-1 1.7 1.7 0 0 0-.3-1.9L4.2 7 7 4.2l.1.1a1.7 1.7 0 0 0 1.9.3A1.7 1.7 0 0 0 10 3v-.2h4V3a1.7 1.7 0 0 0 1 1.6 1.7 1.7 0 0 0 1.9-.3l.1-.1L19.8 7l-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0 1.6 1h.2v4H21a1.7 1.7 0 0 0-1.6 1Z"></path>
                        </svg>
                        Instellingen
                    </a>

                    <button type="button" class="app-dropdown-link" data-theme-toggle aria-pressed="false">
                        <svg class="theme-icon theme-icon-moon" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M20.5 14.1A8.5 8.5 0 0 1 9.9 3.5 8.5 8.5 0 1 0 20.5 14Z"></path>
                        </svg>
                        <svg class="theme-icon theme-icon-sun" viewBox="0 0 24 24" aria-hidden="true">
                            <circle cx="12" cy="12" r="4"></circle>
                            <path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"></path>
                        </svg>
                        <span data-theme-label>Donkere modus</span>
                    </button>

                    <hr>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="app-dropdown-link app-dropdown-danger">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M10 17l5-5-5-5M15 12H3M15 4h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-4"></path>
                            </svg>
                            Uitloggen
                        </button>
                    </form>
                </div>
            </details>
        </div>
    </div>
</header>
