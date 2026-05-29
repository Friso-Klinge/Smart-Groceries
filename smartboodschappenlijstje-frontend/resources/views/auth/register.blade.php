<x-auth-layout title="Smart Groceries — Registreren">
    <h2 class="auth-card-title">Maak je account aan</h2>

    <p class="auth-card-text">
        Begin vandaag nog met besparen op je boodschappen.
    </p>

    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <div class="form-group">
            <label for="name">Volledige naam</label>

            <div class="input-wrapper">
                <span class="input-icon">👤</span>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Jan Jansen"
                    required
                    autofocus
                    autocomplete="name"
                >
            </div>

            @error('name')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

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
                    autocomplete="new-password"
                >
            </div>

            @error('password')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Bevestig wachtwoord</label>

            <div class="input-wrapper">
                <span class="input-icon">🔒</span>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    placeholder="••••••••"
                    required
                    autocomplete="new-password"
                >
            </div>

            @error('password_confirmation')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="auth-button">
            Account aanmaken
        </button>

        <p class="auth-switch">
            Heb je al een account?

            <a href="{{ route('login') }}">
                Inloggen
            </a>
        </p>
    </form>
</x-auth-layout>