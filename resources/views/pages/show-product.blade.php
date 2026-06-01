@extends('layouts.master')

@section('customCSS')
    <style>
        .product-card:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.10) !important;
            transform: translateY(-4px);
        }

        .product-card:hover .product-img {
            transform: scale(1.06);
        }

        .wishlist-btn:hover {
            background: #fef2f2 !important;
            box-shadow: 0 2px 12px rgba(239, 68, 68, 0.12) !important;
        }

        .wishlist-btn:hover svg {
            stroke: #ef4444;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid px-4 px-md-5 my-5">

        {{-- Section Header --}}
        <div class="text-center mb-5">
            <span class="badge text-uppercase fw-semibold px-3 py-2 mb-3"
                style="background:#f1f5f9; color:#64748b; letter-spacing:2px; font-size:11px; border-radius:20px;">
                New Arrivals
            </span>
            <h2 class="fw-bold mb-2" style="font-size:2rem; color:#0f172a;">Our Latest Products</h2>
            <p class="text-muted mx-auto" style="max-width:420px; font-size:0.95rem;">
                Discover our freshest collection, handpicked just for you.
            </p>
        </div>

        {{-- Product Grid --}}
        <div class="row g-4" id="product-list-container">
            @include('partials.product-grid',['products' => $products])
        </div>

        {{-- Load More --}}
        <div class="text-center mt-5">
            <a href="#" class="btn px-5 py-2 fw-semibold"
                style="border: 1.5px solid #0f172a; color:#0f172a; border-radius:12px; font-size:0.9rem; transition: all 0.2s;">
                Load More
            </a>
        </div>

        <div class="modal fade" id="divModalProductView" tabindex="-1" aria-hidden="true">
            <input type="hidden" id="hdnProductId" name="hdnProductId">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

                    <div class="modal-header border-bottom-0 pt-4 px-4 pb-2">
                        <h5 class="modal-title fw-bold text-dark fs-4" id="modalProdName">Product Name</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body px-4 pb-4 pt-2">
                        <div class="row align-items-center g-4">

                            <div class="col-md-6 text-center">
                                <div class="p-2 rounded-4 bg-light d-flex align-items-center justify-content-center shadow-sm"
                                    style="min-height: 320px;">
                                    <img id="modalProdImage" src="" class="img-fluid rounded-3" alt="Product Image"
                                        style="max-height: 300px; object-fit: contain; width: 100%;">
                                </div>
                            </div>

                            <div class="col-md-6 d-flex flex-column justify-content-center">

                                <div class="mb-2">
                                    <span id="modalProdPrice" class="fs-3 fw-black text-danger d-inline-block"
                                        style="letter-spacing: -0.5px;">Rs. 0.00</span>
                                </div>

                                <p class="text-muted mb-4 lh-base" id="modalProdDesc" style="font-size: 0.95rem;">
                                    Product description will appear here...
                                </p>

                                <div class="d-flex align-items-center mb-4 gap-3">
                                    <span class="fw-semibold text-secondary small text-uppercase"
                                        style="letter-spacing: 0.5px; min-width: 70px;">Quantity</span>

                                    <div class="d-flex align-items-center rounded-3 border bg-light p-1"
                                        style="border-color: #e2e8f0 !important;">
                                        <button type="button" id="btnMinus"
                                            class="btn d-flex align-items-center justify-content-center rounded-2 border-0"
                                            style="width: 36px; height: 36px; background: #ffffff; font-size: 1.1rem; color: #94a3b8; font-weight: bold; transition: all 0.2s;"
                                            onmouseover="this.style.background='#f1f5f9'"
                                            onmouseout="this.style.background='#ffffff'">
                                            −
                                        </button>

                                        <input type="text" id="txtQuantity" value="1" readonly
                                            class="text-center fw-bold border-0 bg-transparent shadow-none"
                                            style="width: 45px; font-size: 1rem; color: #0f172a; outline: none;">

                                        <button type="button" id="btnPlus"
                                            class="btn d-flex align-items-center justify-content-center rounded-2 border-0"
                                            style="width: 36px; height: 36px; background: #ffffff; font-size: 1.1rem; color: #64748b; font-weight: bold; transition: all 0.2s;"
                                            onmouseover="this.style.background='#f1f5f9'"
                                            onmouseout="this.style.background='#ffffff'">
                                            +
                                        </button>
                                    </div>
                                </div>

                                <div class="d-flex flex-column flex-sm-row gap-2 mt-2">
                                    <button
                                        class="btn btn-dark btn-lg px-4 py-2.5 fs-6 fw-semibold rounded-3 d-flex align-items-center justify-content-center gap-2 shadow-sm border-0 flex-grow-1 btnAddToCart"
                                        style="background: #0f172a; transition: all 0.2s;"
                                        onmouseover="this.style.background='#1e293b'"
                                        onmouseout="this.style.background='#0f172a'">
                                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                        Add to Cart
                                    </button>
                                    <a href="{{ route('buyItem.show') }}"
                                        class="btn btn-primary btn-lg px-4 py-2.5 fs-6 fw-semibold rounded-3 shadow-sm border-0 flex-grow-1"
                                        style="background: #2563eb; transition: all 0.2s;"
                                        onmouseover="this.style.background='#1d4ed8'"
                                        onmouseout="this.style.background='#2563eb'" id="btnBuy">
                                        Buy Now
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('customJS')
    <script> const USER = "{{ auth()->user()->id }}"; </script>
    <script
        src="{{ asset('controllers/show-product.js') }}?v={{ filemtime(public_path('controllers/show-product.js')) }}">
    </script>
    <script src="{{ asset('controllers/add-to-cart.js') }}?v={{ filemtime(public_path('controllers/add-to-cart.js')) }}"></script>
    <script src="{{ asset('controllers/buy-item.js') }}?v={{ filemtime(public_path('controllers/buy-item.js')) }}"></script>
@endsection
