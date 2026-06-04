<header class="app-navbar">
    <div class="app-navbar-inner">

        <a href="{{ route('dashboard') }}" class="app-brand">
            <span class="app-logo">
                🌿
            </span>

            <div>
                <div class="app-brand-title">
                    Smart Groceries
                </div>

                <div class="app-brand-subtitle">
                    Shop smart. Save more.
                </div>
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

            <a href="#" class="app-nav-link">
                Results
            </a>

            <a href="#" class="app-nav-link">
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
                        ⚙️ Profiel
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="app-dropdown-link app-dropdown-danger">
                            🚪 Uitloggen
                        </button>
                    </form>
                </div>
            </details>
        </div>

    </div>
</header>