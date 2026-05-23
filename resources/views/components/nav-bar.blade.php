<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top shadow-sm py-3">
    <div class="container-fluid px-4 px-md-5">

        <a class="navbar-brand d-flex align-items-center gap-2 text-decoration-none" href="#">
            <div class="d-flex align-items-center justify-content-center rounded-3 bg-dark text-white"
                style="width: 40px; height: 40px;">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <span class="fw-bold fs-4 text-dark tracking-tight">Multi<span
                    class="text-secondary fw-light">Shop</span></span>
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mb-2 mb-md-0 gap-md-3">
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-dark" href="{{ route('home.show') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-muted hover:text-dark" href="#">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-muted hover:text-dark" href="#">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-muted hover:text-dark" href="#">About</a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-3 mt-3 mt-md-0">

                <button type="button" id="btnToggleSearch"
                    class="btn btn-link p-2 text-dark rounded-circle border-0 text-decoration-none"
                    style="background: #f8fafc;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <div class="dropdown">
                    <button class="btn btn-link p-2 text-dark rounded-circle border-0 text-decoration-none"
                        style="background: #f8fafc;" type="button" id="userDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-3 py-2 mt-2"
                        aria-labelledby="userDropdown">
                        <li><a class="dropdown-item px-4 py-2 text-sm fw-medium" href="{{ route('customer.show') }}">My Profile</a></li>
                        <li><a class="dropdown-item px-4 py-2 text-sm fw-medium" href="#">Orders</a></li>
                        <li>
                            @auth
                                @if (auth()->user()->role === 'vendor')
                                    <a href="{{ route('product.add') }}" class="dropdown-item px-4 py-2 text-sm fw-medium">
                                        Vendor Dashboard
                                    </a>
                                @endif
                            @endauth
                        </li>
                        <li>
                            <hr class="dropdown-divider my-1 bg-light">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                                @csrf
                                <button type="submit"
                                    class="dropdown-item px-4 py-2 text-sm fw-medium text-danger border-0 bg-transparent w-100 text-start">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>

                <a href="{{ route('cart.show') }}"
                    class="btn btn-link p-2 text-dark rounded-circle border-0 text-decoration-none position-relative"
                    style="background: #f8fafc;">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger font-bold flex items-center justify-center"
                        style="font-size: 10px; width: 18px; height: 18px; padding: 0;" id="lblCartCount">0</span>
                </a>

            </div>
        </div>
    </div>
</nav>

<div id="searchPanel" class="bg-light border-bottom py-3 d-none animate__animated animate__fadeIn">
    <div class="container" style="max-width: 700px;">
        <div class="position-relative">
            <input type="text" class="form-control form-control-lg border-0 shadow-sm rounded-4 ps-5"
                placeholder="Search for products, categories or brands..." style="font-size: 0.95rem;">
            <div class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>
</div>
{{-- <script src="{{ asset('controllers/add-to-cart.js') }}?v={{ filemtime(public_path('controllers/add-to-cart.js')) }}"></script> --}}

