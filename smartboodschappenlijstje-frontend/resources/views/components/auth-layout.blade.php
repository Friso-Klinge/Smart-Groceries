@props([
    'title' => 'Smart Groceries',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }}</title>

    @vite(['resources/css/app.css', 'resources/css/auth.css'])
</head>
<body>
    <main class="auth-page">
        <div class="auth-blob auth-blob-top"></div>
        <div class="auth-blob auth-blob-bottom"></div>

        <img
            src="{{ asset('images/capybara-peek.png') }}"
            alt=""
            class="auth-peek auth-peek-left"
            aria-hidden="true"
        >

        <img
            src="{{ asset('images/capybara-peek.png') }}"
            alt=""
            class="auth-peek auth-peek-right"
            aria-hidden="true"
        >

        <section class="auth-container">
            <div class="auth-brand">
                <div class="auth-logo-row">
                    <div class="auth-logo">
                        <span>🌿</span>
                    </div>

                    <div>
                        <p class="auth-brand-name">Smart Groceries</p>
                        <p class="auth-brand-subtitle">Slim boodschappen doen. Meer besparen.</p>
                    </div>
                </div>

                <div class="auth-intro">
                    <h1>
                        Slimmer kopen,
                        <span>minder betalen.</span>
                    </h1>

                    <p>
                        Maak je boodschappenlijst en wij vergelijken Albert Heijn, Jumbo,
                        Lidl en Aldi om het goedkoopste plan te vinden — inclusief de beste route
                        tussen de winkels.
                    </p>
                </div>

                <div class="auth-mascot-wrapper">
                    <img
                        src="{{ asset('images/capybara-mascot.png') }}"
                        alt="Smart Groceries capybara mascotte"
                        class="auth-mascot"
                    >

                    <div class="auth-badge">
                        ✨ Bespaar tot 30%
                    </div>
                </div>
            </div>

            <div class="auth-card-wrapper">
                <div class="auth-card">
                    <div class="auth-mobile-mascot">
                        <img
                            src="{{ asset('images/capybara-mascot.png') }}"
                            alt="Smart Groceries capybara mascotte"
                        >
                    </div>

                    {{ $slot }}
                </div>
            </div>
        </section>
    </main>
</body>
</html>