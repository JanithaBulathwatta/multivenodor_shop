@extends('layouts.master')

@section('customCSS')
<style>

    .modern-input {
        border: none !important;
        border-bottom: 2px solid #e2e8f0 !important;
        border-radius: 0 !important;
        padding: 1.2rem 0.75rem 0.4rem 0.5rem !important;
        background-color: transparent !important;
        font-weight: 500;
        color: #334155 !important;
    }
    .modern-input:focus {
        box-shadow: none !important;
        border-bottom-color: #2563eb !important;
    }


    .modern-textarea {
        border: 2px solid #e2e8f0 !important;
        border-radius: 10px !important;
        background-color: #f8fafc !important;
        padding: 12px 16px !important;
        color: #334155 !important;
        resize: none;
    }


    .qty-input {
        border: 2px solid #e2e8f0 !important;
        border-radius: 20px !important;
        padding: 6px !important;
        background-color: #ffffff !important;
        font-size: 0.9rem;
    }


    .premium-btn:hover {
        background-color: #0f172a !important;
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(15, 23, 42, 0.25) !important;
    }

    .fw-extrabold { font-weight: 800; }
    .tracking-wider { letter-spacing: 0.05em; }
</style>
@endsection

@section('content')
    <div class="container-fluid p-0 overflow-hidden" style="min-height: 100vh; background-color: #ffffff;">
    <div class="row g-0" style="min-height: 100vh;">

        <div class="col-lg-7 d-flex align-items-center justify-content-center p-4 p-md-5">
            <div style="max-width: 580px; width: 100%;">
                <input type="hidden" id="hdnProductIdForBuy" name="hdnProductIdForBuy" value="">

                <div class="mb-5">
                    <span class="text-primary fw-bold small text-uppercase tracking-wider">Checkout</span>
                    <h2 class="fw-bold text-dark mt-1" style="letter-spacing: -0.8px;">Shipping & Billing</h2>
                    <p class="text-muted small">Please review your pre-filled account details below.</p>
                </div>

                <div class="row g-4">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control modern-input" value="" required id="txtCusName" readonly placeholder="Full Name">
                            <label class="text-muted small" for="txtCusName">Customer Full Name</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control modern-input" value="" required readonly id="txtCusMobile" placeholder="Mobile Number">
                            <label class="text-muted small" for="txtCusMobile">Mobile Number</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label small fw-semibold text-secondary ms-1 mb-2">Shipping Address</label>
                            <textarea class="form-control modern-textarea" rows="4" required readonly id="txtCusAddress" placeholder="Your delivery address details..."></textarea>
                        </div>
                    </div>
                </div>

                <div class="mt-4 ms-1">
                    <a href="#" class="text-decoration-none text-muted small hover-underline"><i class="bi bi-arrow-left me-1"></i> Return to shop</a>
                </div>
            </div>
        </div>

        <div class="col-lg-5 d-flex align-items-center justify-content-center p-4 p-md-5" style="background-color: #f8fafc; border-left: 1px solid #f1f5f9;">
            <div style="max-width: 440px; width: 100%;">

                <h4 class="fw-bold text-dark mb-4" style="letter-spacing: -0.5px;">Order Summary</h4>

                <div class="d-flex align-items-center pb-4 mb-4" style="border-bottom: 1px solid #e2e8f0;">
                    <div class="position-relative">
                        <img src="" alt="product" class="rounded-3 shadow-sm"
                            style="width: 80px; height: 80px; object-fit: cover; background: #fff;" id="imgProdcutImage">
                    </div>

                    <div class="ms-3 flex-grow-1">
                        <h6 class="fw-bold text-dark mb-1" id="txtProductName" style="font-size: 0.95rem;"></h6>
                        <p class="text-muted small mb-0 text-truncate" style="max-width: 180px;" id="txtProductDescription"></p>
                        <span class="fw-bold text-primary d-block mt-1 fs-5" id="unit-price" data-price=""></span>
                    </div>

                    <div style="width: 75px;">
                        <span class="d-block text-center text-muted small mb-1" style="font-size: 10px; font-weight: 700;">QUANTITY</span>
                        <input type="number" id="quantity" class="form-control text-center fw-bold qty-input" value="1" min="1">
                    </div>
                </div>

                <div class="mb-4" style="font-size: 0.95rem;">
                    <div class="d-flex justify-content-between mb-2.5">
                        <span class="text-muted">Subtotal</span>
                        <span class="fw-semibold text-dark" id="subtotal"></span>
                    </div>
                    <div class="d-flex justify-content-between mb-2.5 text-success">
                        <span>Discount</span>
                        <span class="fw-medium">Rs. 0.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2.5">
                        <span class="text-muted">Shipping Fee</span>
                        <span class="fw-semibold text-dark" id="shipping" data-fee="350">Rs. 350.00</span>
                    </div>
                    <div class="d-flex justify-content-between pb-3 mb-3">
                        <span class="text-muted">Other Fees</span>
                        <span class="fw-semibold text-dark">Rs. 0.00</span>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center pt-3 mb-4" style="border-top: 2px solid #e2e8f0;">
                    <span class="fw-bold text-dark fs-5">Total to Pay</span>
                    <span class="fw-extrabold text-dark fs-3" id="txtTotalPrice" style="letter-spacing: -0.5px;"></span>
                </div>

                <button type="submit" class="btn w-100 text-white fw-bold premium-btn" id="btnConfirmOrder"
                    style="background-color: #1e293b; border-radius: 30px; padding: 14px; font-size: 0.95rem; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(30, 41, 59, 0.15);">
                    Confirm Order (Cash on Delivery)
                </button>
            </div>
        </div>

    </div>
</div>

@endsection

@section('customJS')
    <script src="{{ asset('controllers/buy-item.js') }}?v={{ filemtime(public_path('controllers/buy-item.js')) }}"></script>
@endsection
