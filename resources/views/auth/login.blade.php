<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Premium Audio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full antialiased font-sans">

    <div class="flex min-h-screen">

        <div class="hidden lg:flex lg:w-1/2 bg-slate-950 relative items-center justify-center p-12 overflow-hidden bg-cover bg-center select-none"
             style="background-image: url('{{ asset('storage/images/headphone.png') }}');">

            <div class="absolute inset-0 bg-gradient-to-tr from-slate-950 via-slate-950/40 to-transparent"></div>
            <div class="absolute inset-0 bg-slate-950/30 backdrop-blur-[1px]"></div>

            <div class="relative z-10 mt-auto w-full max-w-md">
                <p class="text-indigo-400 tracking-widest text-xs font-bold uppercase mb-2">Sound Redefined</p>
                <h1 class="text-4xl lg:text-5xl font-black text-white tracking-tight leading-none mb-4">
                    PREMIUM AUDIO<br>EXPERIENCE
                </h1>
                <p class="text-slate-400 text-sm font-medium max-w-sm">Immerse yourself in pure sound, crafted for those who demand the absolute best.</p>

                <div class="flex items-center gap-1.5 mt-8 opacity-40">
                    <span class="w-1 h-6 bg-white rounded-full"></span>
                    <span class="w-1 h-10 bg-white rounded-full"></span>
                    <span class="w-1 h-16 bg-white rounded-full"></span>
                    <span class="w-1 h-12 bg-white rounded-full"></span>
                    <span class="w-1 h-8 bg-white rounded-full"></span>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 bg-white flex flex-col justify-center px-6 py-12 sm:px-12 md:px-20 lg:px-24 relative">

            <div class="mx-auto w-full max-w-md">
                <x-auth-session-status class="mb-6 font-medium text-sm text-center text-green-600" :status="session('status')" />

                <div class="mb-8">
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight sm:text-4xl">Log In to your Account</h2>
                    <p class="text-sm text-slate-500 mt-2.5 font-medium">Welcome back! Please enter your details below.</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Email Address</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-600 transition-colors duration-200">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input id="email"
                                   class="block w-full pl-11 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50/50 text-slate-900 placeholder-slate-400 focus:bg-white focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition-all duration-200 outline-none font-medium shadow-sm"
                                   type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus
                                   autocomplete="username"
                                   placeholder="janitha" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-semibold text-red-500" />
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-sm font-bold text-slate-700">Password</label>
                            @if (Route::has('password.request'))
                                <a class="text-xs font-bold text-indigo-600 hover:text-indigo-800 transition-colors duration-200" href="{{ route('password.request') }}">
                                    Password Reset?
                                </a>
                            @endif
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-600 transition-colors duration-200">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input id="password"
                                   class="block w-full pl-11 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50/50 text-slate-900 placeholder-slate-400 focus:bg-white focus:border-indigo-600 focus:ring-4 focus:ring-indigo-50 transition-all duration-200 outline-none font-medium shadow-sm"
                                   type="password"
                                   name="password"
                                   required
                                   autocomplete="current-password"
                                   placeholder="••••••••" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs font-semibold text-red-500" />
                    </div>

                    <div class="flex items-center justify-between pt-1">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer group select-none">
                            <input id="remember_me" type="checkbox" class="w-4 h-4 rounded border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500 cursor-pointer transition-colors duration-200" name="remember">
                            <span class="ms-2 text-sm text-slate-600 font-semibold group-hover:text-slate-900 transition-colors duration-200">Remember me</span>
                        </label>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-xl shadow-indigo-600/10 text-sm font-bold text-white bg-slate-900 hover:bg-slate-800 focus:outline-none focus:ring-4 focus:ring-slate-200 transform active:scale-[0.99] transition-all duration-200 tracking-wide">
                            Sign In
                        </button>
                    </div>
                </form>

                <div class="text-center mt-6">
                    <p class="text-sm text-slate-500 font-medium">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="font-bold text-indigo-600 hover:text-indigo-800 transition-colors duration-200 ml-1 underline underline-offset-4">
                            Sign up for free
                        </a>
                    </p>
                </div>
            </div>

            <div class="mt-auto pt-10 flex items-center justify-center lg:justify-start gap-6 text-xs font-bold text-slate-400">
                <a href="#" class="hover:text-slate-600 transition-colors duration-200">Terms of Service</a>
                <a href="#" class="hover:text-slate-600 transition-colors duration-200">Privacy Policy</a>
            </div>

        </div>
    </div>

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
