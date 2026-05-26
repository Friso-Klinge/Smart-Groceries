<x-auth-layout title="Smart Groceries — Inloggen">
    <h2 class="auth-card-title">Welkom terug</h2>

    <p class="auth-card-text">
        Log in om verder te gaan met besparen op je boodschappen.
    </p>

    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <div class="form-group">
            <label for="email">E-mailadres</label>

            <div class="input-wrapper">
                <span class="input-icon">✉️</span>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="jij@example.com"
                    required
                    autofocus
                    autocomplete="username"
                >
            </div>

            @error('email')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Wachtwoord</label>

            <div class="input-wrapper">
                <span class="input-icon">🔒</span>

                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required
                    autocomplete="current-password"
                >
            </div>

            @error('password')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-options">
            <label class="remember-label">
                <input type="checkbox" name="remember">

                <span>Onthoud mij</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    Wachtwoord vergeten?
                </a>
            @endif
        </div>

        <button type="submit" class="auth-button">
            Inloggen
        </button>

        <p class="auth-switch">
            Nog geen account?

            <a href="{{ route('register') }}">
                Maak er een aan
            </a>
        </p>
    </form>
</x-auth-layout>