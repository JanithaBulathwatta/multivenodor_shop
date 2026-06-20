<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - Multishop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full antialiased font-sans bg-white m-0 p-0">

    <div class="flex min-h-screen w-full overflow-x-hidden">

        <!-- [LEFT BANNER]: 40% Width on Desktop, Hidden on Mobile -->
        <div class="hidden lg:flex lg:w-2/5 bg-slate-950 relative flex-col justify-between p-12 bg-cover bg-center select-none border-r border-slate-100"
            style="background-image: url('{{ asset('storage/images/headphone.png') }}');">

            <!-- Dark Premium Overlay to fade the image edges -->
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/20 to-slate-950/80"></div>
            <div class="absolute inset-0 bg-slate-950/40"></div>

            <!-- Top Logo/Brand Area (Multishop Branding) -->
            <div class="relative z-10 flex items-center gap-2.5">
                <div
                    class="w-9 h-9 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-black text-base shadow-lg shadow-indigo-600/30 tracking-wider">
                    M</div>
                <span class="text-white font-black tracking-tight text-xl">Multi<span
                        class="text-indigo-400">shop</span></span>
            </div>

            <!-- Bottom Content Area -->
            <div class="relative z-10">
                <span
                    class="text-[10px] bg-indigo-500/20 backdrop-blur-md text-indigo-300 px-3 py-1 rounded-full font-bold uppercase tracking-widest border border-indigo-500/30">
                    Multi-Vendor Marketplace
                </span>
                <h1 class="text-3xl font-black text-white tracking-tight mt-4 leading-tight">
                    Welcome to<br>the Next-Gen Retail.
                </h1>
                <p class="text-slate-400 text-xs mt-2 max-w-xs font-medium leading-relaxed">
                    Join Multishop today. Discover thousands of verified vendors or set up your own storefront in
                    minutes.
                </p>
            </div>
        </div>

        <!-- [RIGHT FORM AREA]: 60% Width on Desktop, 100% on Mobile -->
        <div class="w-full lg:w-3/5 bg-slate-50/30 flex flex-col justify-center px-6 py-12 sm:px-16 md:px-20 lg:px-24">

            <div class="w-full max-w-xl mx-auto">

                <!-- Form Header -->
                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8 pb-6 border-b border-slate-100">
                    <div>
                        <h2 class="text-2xl font-black text-slate-900 tracking-tight sm:text-3xl">Join Multishop</h2>
                        <p class="text-xs text-slate-500 mt-1 font-medium">Create your merchant or customer account.</p>
                    </div>
                    <div>
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center text-xs font-bold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 px-4 py-2.5 rounded-xl transition-all duration-200">
                            Already a member? Sign In
                        </a>
                    </div>
                </div>

                <!-- Registration Form -->
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- SECTION 1: Personal Details Group Card -->
                    <div class="bg-white p-5 sm:p-6 rounded-2xl border border-slate-100 shadow-sm space-y-4">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">01.
                            Personal Information</span>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-xs font-bold text-slate-600 mb-1.5 ms-0.5">Full
                                    Name</label>
                                <input id="name"
                                    class="block w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 placeholder-slate-400 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition-all duration-200 outline-none text-sm font-medium"
                                    type="text" name="name" value="{{ old('name') }}" required autofocus
                                    placeholder="e.g. John Doe" />
                                <x-input-error :messages="$errors->get('name')" class="mt-1.5 text-xs font-semibold text-red-500" />
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-xs font-bold text-slate-600 mb-1.5 ms-0.5">Email
                                    Address</label>
                                <input id="email"
                                    class="block w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 placeholder-slate-400 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition-all duration-200 outline-none text-sm font-medium"
                                    type="email" name="email" value="{{ old('email') }}" required
                                    placeholder="name@domain.com" />
                                <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs font-semibold text-red-500" />
                            </div>
                        </div>

                        <!-- Role Selection (Dropdown) -->
                        <div>
    <label for="role" class="block text-xs font-bold text-slate-600 mb-1.5 ms-0.5">I want to register as a:</label>
    <select id="role"
            name="role"
            class="block w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition-all duration-200 outline-none text-sm font-bold cursor-pointer pr-10">
        <option value="customer">🛒 Customer (Explore & Buy Products)</option>
        <option value="vendor">🏪 Vendor (Setup Shop & Sell Products)</option>
    </select>
    <x-input-error :messages="$errors->get('role')" class="mt-1.5 text-xs font-semibold text-red-500" />
</div>
                    </div>

                    <!-- SECTION 2: Security Details Group Card -->
                    <div class="bg-white p-5 sm:p-6 rounded-2xl border border-slate-100 shadow-sm space-y-4">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">02.
                            Account Security</span>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Password -->
                            <div>
                                <label for="password"
                                    class="block text-xs font-bold text-slate-600 mb-1.5 ms-0.5">Password</label>
                                <input id="password"
                                    class="block w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 placeholder-slate-400 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition-all duration-200 outline-none text-sm font-medium"
                                    type="password" name="password" required placeholder="••••••••" />
                                <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs font-semibold text-red-500" />
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="password_confirmation"
                                    class="block text-xs font-bold text-slate-600 mb-1.5 ms-0.5">Confirm
                                    Password</label>
                                <input id="password_confirmation"
                                    class="block w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-slate-900 placeholder-slate-400 focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition-all duration-200 outline-none text-sm font-medium"
                                    type="password" name="password_confirmation" required placeholder="••••••••" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5 text-xs font-semibold text-red-500" />
                            </div>
                        </div>
                    </div>

                    <!-- Terms checkbox & Submit Button Group -->
                    <div class="space-y-4 pt-2">
                        <div class="flex items-start ms-1">
                            <div class="flex items-center h-5">
                                <input id="terms" type="checkbox" required
                                    class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 cursor-pointer transition-colors duration-200">
                            </div>
                            <label for="terms"
                                class="ms-2.5 text-xs text-slate-500 font-medium cursor-pointer select-none">
                                I agree to the <a href="#"
                                    class="text-indigo-600 hover:underline font-semibold">Terms of Service</a> and <a
                                    href="#" class="text-indigo-600 hover:underline font-semibold">Privacy
                                    Policy</a>.
                            </label>
                        </div>

                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 py-4 px-4 border border-transparent rounded-xl shadow-xl shadow-indigo-600/10 text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-100 transform active:scale-[0.99] transition-all duration-200 tracking-wide">
                            <span>Register Now</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <!-- Autofill Yellow BG Fix -->
    <style>
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus {
            -webkit-box-shadow: 0 0 0px 1000px white inset !important;
            box-shadow: 0 0 0px 1000px white inset !important;
            -webkit-text-fill-color: #0f172a !important;
        }
    </style>
</body>

</html>
