<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'MultShop') }} — Shop Everything in One Cart</title>
    <meta name="description" content="MultShop is a marketplace for electronics, fashion, home, beauty and more — fast delivery, secure checkout, real support.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ink: '#14122B',
                        muted: '#6B6880',
                        primary: { DEFAULT: '#4C3CDB', dark: '#342A9E', light: '#EFEBFF' },
                        accent: { DEFAULT: '#FF6B4A', dark: '#E5532F' },
                        cream: '#FAFAF8',
                    },
                    fontFamily: {
                        display: ['"Space Grotesk"', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                        mono: ['"DM Mono"', 'monospace'],
                    },
                },
            },
        }
    </script>

    <style>
        body { font-family: 'Inter', sans-serif; background-color: #FAFAF8; color: #14122B; }
        .font-display { font-family: 'Space Grotesk', sans-serif; }
        .font-mono { font-family: 'DM Mono', monospace; }

        /* Coupon / ticket-stub signature used on the feature cards */
        .ticket-card { position: relative; border: 1.5px dashed rgba(20, 18, 43, 0.18); }
        .ticket-card::before,
        .ticket-card::after {
            content: ''; position: absolute; width: 18px; height: 18px;
            background: #FAFAF8; border: 1.5px dashed rgba(20, 18, 43, 0.18);
            border-radius: 50%; top: 50%; transform: translateY(-50%);
        }
        .ticket-card::before { left: -10px; }
        .ticket-card::after { right: -10px; }

        /* Scrolling category ticker */
        .ticker-track { display: flex; width: max-content; animation: ticker 26s linear infinite; }
        @keyframes ticker { from { transform: translateX(0); } to { transform: translateX(-50%); } }

        .fade-up { opacity: 0; transform: translateY(16px); animation: fadeUp .8s ease-out forwards; }
        @keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }

        @media (prefers-reduced-motion: reduce) {
            .ticker-track { animation: none; }
            .fade-up { opacity: 1 !important; transform: none !important; animation: none !important; }
        }

        :focus-visible { outline: 2px solid #FF6B4A; outline-offset: 2px; }
    </style>
</head>
<body class="antialiased">

    {{-- HERO --}}
    <section class="relative isolate overflow-hidden bg-ink min-h-[88vh] flex flex-col">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image:url('https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=1800&q=80');"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-ink/95 via-ink/80 to-primary/70"></div>

        @if (Route::has('login'))
        <header class="relative z-20">
            <nav class="flex items-center justify-between px-6 sm:px-10 py-6">
                <a href="{{ url('/') }}" class="flex items-center gap-1 font-display text-xl font-bold text-white">
                    MultShop<span class="text-accent">.</span>
                </a>
                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="rounded-full bg-white px-5 py-2 text-sm font-semibold text-ink hover:bg-cream transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-full border border-white/30 px-5 py-2 text-sm font-medium text-white hover:border-white/70 hover:bg-white/10 transition">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-full bg-accent px-5 py-2 text-sm font-semibold text-white hover:bg-accent-dark transition">
                                Sign up
                            </a>
                        @endif
                    @endauth
                </div>
            </nav>
        </header>
        @endif

        <div class="relative z-10 flex-1 flex items-center px-6 sm:px-10">
            <div class="max-w-2xl py-16">
                <span class="fade-up inline-block font-mono text-xs tracking-[0.2em] uppercase text-accent" style="animation-delay:.05s">
                    MultShop Marketplace
                </span>
                <h1 class="fade-up mt-5 font-display text-4xl sm:text-5xl lg:text-6xl font-bold leading-[1.05] text-white" style="animation-delay:.15s">
                    One cart for everything<br class="hidden sm:block"> you didn't know you needed.
                </h1>
                <p class="fade-up mt-6 max-w-lg text-base sm:text-lg text-white/75" style="animation-delay:.3s">
                    Gadgets, outfits, groceries, decor — MultShop brings every category under one roof, with fast delivery and checkout that actually feels secure.
                </p>
                <div class="fade-up mt-8 flex flex-wrap items-center gap-4" style="animation-delay:.45s">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="rounded-full bg-accent px-7 py-3 text-sm font-semibold text-white hover:bg-accent-dark transition">
                            Go to dashboard
                        </a>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-full bg-accent px-7 py-3 text-sm font-semibold text-white hover:bg-accent-dark transition">
                                Start shopping
                            </a>
                        @endif
                        <a href="#categories" class="rounded-full border border-white/30 px-7 py-3 text-sm font-medium text-white hover:bg-white/10 transition">
                            See what's inside
                        </a>
                    @endauth
                </div>
            </div>
        </div>

        {{-- Category ticker --}}
        <div class="relative z-10 border-t border-dashed border-white/20 bg-black/10 py-3 overflow-hidden">
            <div class="ticker-track font-mono text-xs sm:text-sm uppercase tracking-wide text-white/60">
                @for ($i = 0; $i < 2; $i++)
                    <span class="flex items-center shrink-0">
                        <span class="px-4">Electronics</span>•<span class="px-4">Fashion</span>•<span class="px-4">Home & Living</span>•<span class="px-4">Beauty</span>•<span class="px-4">Sports</span>•<span class="px-4">Groceries</span>•<span class="px-4">Toys</span>•<span class="px-4">Books</span>
                    </span>
                @endfor
            </div>
        </div>
    </section>

</body>
</html>
