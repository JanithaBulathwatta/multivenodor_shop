{{-- resources/views/components/navbar.blade.php --}}

<header x-data="{ mobileOpen: false, cartCount: 0 }" class="w-full">

    {{-- Top Bar --}}
    <div class="bg-zinc-950 text-zinc-400 text-xs py-2 hidden md:block">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <span>Free shipping on orders over $75</span>
            <div class="flex gap-6">
                <a href="#" class="hover:text-white transition-colors">Track Order</a>
                <a href="#" class="hover:text-white transition-colors">Support</a>
                <a href="#" class="hover:text-white transition-colors">Store Locator</a>
            </div>
        </div>
    </div>

    {{-- Main Navbar --}}
    <nav class="bg-white border-b border-zinc-100 sticky top-0 z-50 shadow-[0_1px_20px_rgba(0,0,0,0.06)]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between h-16">

                {{-- Logo --}}
                <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                    <div class="w-8 h-8 bg-zinc-900 rounded-lg flex items-center justify-center group-hover:bg-zinc-700 transition-colors">
                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="text-zinc-900 font-bold text-lg tracking-tight">Multi<span class="text-zinc-400 font-light">Shop</span></span>
                </a>

                {{-- Desktop Nav Links --}}
                <ul class="hidden lg:flex items-center gap-1">
                    <li>
                        <a href="{{ url('/') }}"
                           class="px-4 py-2 rounded-lg text-sm font-medium text-zinc-900 bg-zinc-100 hover:bg-zinc-200 transition-colors">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/shop') }}"
                           class="px-4 py-2 rounded-lg text-sm font-medium text-zinc-500 hover:text-zinc-900 hover:bg-zinc-100 transition-colors">
                            Shop
                        </a>
                    </li>

                    {{-- Categories Dropdown --}}
                    <li x-data="{ open: false }" class="relative"
                        @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center gap-1.5 px-4 py-2 rounded-lg text-sm font-medium text-zinc-500 hover:text-zinc-900 hover:bg-zinc-100 transition-colors">
                            Categories
                            <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        {{-- Dropdown Panel --}}
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 translate-y-1"
                             class="absolute top-full left-0 mt-1 w-64 bg-white rounded-xl shadow-xl border border-zinc-100 p-2 z-50">

                            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-zinc-50 group transition-colors">
                                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-zinc-800 group-hover:text-zinc-900">Electronics</p>
                                    <p class="text-xs text-zinc-400">Phones, laptops & more</p>
                                </div>
                            </a>

                            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-zinc-50 group transition-colors">
                                <div class="w-8 h-8 bg-pink-50 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-zinc-800 group-hover:text-zinc-900">Fashion</p>
                                    <p class="text-xs text-zinc-400">Clothing, shoes & accessories</p>
                                </div>
                            </a>

                            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-zinc-50 group transition-colors">
                                <div class="w-8 h-8 bg-amber-50 rounded-lg flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-zinc-800 group-hover:text-zinc-900">Home & Living</p>
                                    <p class="text-xs text-zinc-400">Furniture, decor & kitchen</p>
                                </div>
                            </a>

                            <div class="border-t border-zinc-100 mt-2 pt-2">
                                <a href="#" class="flex items-center justify-between px-3 py-2 rounded-lg hover:bg-zinc-50 transition-colors">
                                    <span class="text-sm font-medium text-zinc-500">View all categories</span>
                                    <svg class="w-3.5 h-3.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ url('/contact') }}"
                           class="px-4 py-2 rounded-lg text-sm font-medium text-zinc-500 hover:text-zinc-900 hover:bg-zinc-100 transition-colors">
                            Contact
                        </a>
                    </li>
                </ul>

                {{-- Search Bar (Desktop) --}}
                <div class="hidden md:flex items-center flex-1 max-w-xs mx-6">
                    <div class="relative w-full">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" placeholder="Search products..."
                               class="w-full pl-9 pr-4 py-2 text-sm bg-zinc-50 border border-zinc-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-zinc-900 focus:border-transparent placeholder-zinc-400 transition-all"/>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-2">

                    {{-- Wishlist --}}
                    <a href="#" class="hidden md:flex w-9 h-9 items-center justify-center rounded-lg text-zinc-400 hover:text-zinc-900 hover:bg-zinc-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </a>

                    {{-- Cart --}}
                    <a href="{{ url('/cart') }}" class="relative flex items-center gap-2 px-3 py-2 rounded-lg bg-zinc-900 text-white text-sm font-medium hover:bg-zinc-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        <span class="hidden sm:inline">Cart</span>
                        <span class="flex items-center justify-center w-4 h-4 text-[10px] font-bold bg-red-500 text-white rounded-full" x-text="cartCount">0</span>
                    </a>

                    {{-- Auth Buttons --}}
                    @guest
                        <a href="{{ route('login') }}" class="hidden md:inline-flex px-4 py-2 text-sm font-medium text-zinc-700 hover:text-zinc-900 hover:bg-zinc-100 rounded-lg transition-colors">
                            Sign in
                        </a>
                        <a href="{{ route('register') }}" class="hidden md:inline-flex px-4 py-2 text-sm font-medium bg-zinc-900 text-white rounded-lg hover:bg-zinc-700 transition-colors">
                            Register
                        </a>
                    @else
                        <div x-data="{ open: false }" class="relative hidden md:block" @click.outside="open = false">
                            <button @click="open = !open" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-zinc-100 transition-colors">
                                <div class="w-7 h-7 bg-zinc-200 rounded-full flex items-center justify-center text-xs font-semibold text-zinc-700">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <svg class="w-3.5 h-3.5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="open"
                                 x-transition:enter="transition ease-out duration-150"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 class="absolute right-0 mt-1 w-48 bg-white rounded-xl shadow-xl border border-zinc-100 p-1.5 z-50">
                                <a href="{{ url('/profile') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-zinc-700 hover:bg-zinc-50 transition-colors">
                                    <svg class="w-4 h-4 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    My Profile
                                </a>
                                <a href="{{ url('/orders') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-zinc-700 hover:bg-zinc-50 transition-colors">
                                    <svg class="w-4 h-4 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                    Orders
                                </a>
                                <div class="border-t border-zinc-100 my-1"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-red-500 hover:bg-red-50 transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest

                    {{-- Mobile Menu Toggle --}}
                    <button @click="mobileOpen = !mobileOpen"
                            class="lg:hidden w-9 h-9 flex items-center justify-center rounded-lg text-zinc-500 hover:bg-zinc-100 transition-colors">
                        <svg x-show="!mobileOpen" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg x-show="mobileOpen" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="lg:hidden border-t border-zinc-100 bg-white">
            <div class="max-w-7xl mx-auto px-6 py-4 space-y-1">

                {{-- Mobile Search --}}
                <div class="relative mb-4">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" placeholder="Search products..."
                           class="w-full pl-9 pr-4 py-2.5 text-sm bg-zinc-50 border border-zinc-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-zinc-900 placeholder-zinc-400"/>
                </div>

                <a href="{{ url('/') }}" class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium text-zinc-900 bg-zinc-100">Home</a>
                <a href="{{ url('/shop') }}" class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 transition-colors">Shop</a>

                <div x-data="{ catOpen: false }">
                    <button @click="catOpen = !catOpen" class="w-full flex items-center justify-between px-3 py-2.5 rounded-lg text-sm font-medium text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 transition-colors">
                        Categories
                        <svg class="w-4 h-4 transition-transform" :class="catOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="catOpen" class="ml-4 mt-1 space-y-1 border-l-2 border-zinc-100 pl-3">
                        <a href="#" class="flex px-3 py-2 rounded-lg text-sm text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 transition-colors">Electronics</a>
                        <a href="#" class="flex px-3 py-2 rounded-lg text-sm text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 transition-colors">Fashion</a>
                        <a href="#" class="flex px-3 py-2 rounded-lg text-sm text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 transition-colors">Home & Living</a>
                    </div>
                </div>

                <a href="{{ url('/contact') }}" class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium text-zinc-500 hover:bg-zinc-50 hover:text-zinc-900 transition-colors">Contact</a>

                @guest
                    <div class="flex gap-2 pt-3 border-t border-zinc-100 mt-3">
                        <a href="{{ route('login') }}" class="flex-1 text-center py-2.5 text-sm font-medium border border-zinc-200 rounded-lg text-zinc-700 hover:bg-zinc-50 transition-colors">Sign in</a>
                        <a href="{{ route('register') }}" class="flex-1 text-center py-2.5 text-sm font-medium bg-zinc-900 text-white rounded-lg hover:bg-zinc-700 transition-colors">Register</a>
                    </div>
                @else
                    <div class="pt-3 border-t border-zinc-100 mt-3 space-y-1">
                        <a href="{{ url('/profile') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-sm text-zinc-700 hover:bg-zinc-50 transition-colors">My Profile</a>
                        <a href="{{ url('/orders') }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-sm text-zinc-700 hover:bg-zinc-50 transition-colors">Orders</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-sm text-red-500 hover:bg-red-50 transition-colors">Logout</button>
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</header>
