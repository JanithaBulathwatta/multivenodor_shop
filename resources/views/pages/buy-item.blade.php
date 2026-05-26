@extends('layouts.master')

@section('customCSS')
@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-7">
                <div class="card shadow-sm p-4 mb-4 border-0">
                    <h4 class="mb-4">Customer Details</h4>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" value="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" value="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Shipping Address</label>
                        <textarea class="form-control" rows="3" required></textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card shadow-sm p-4 border-0">
                    <h4 class="mb-4">Order Summary</h4>

                    <div class="d-flex align-items-center pb-3 mb-3 border-bottom">
                        <img src="" alt="product" class="img-fluid rounded"
                            style="width: 80px; height: 80px; object-fit: cover;">
                        <div class="ms-3 flex-grow-1">
                            <h6 class="mb-0"></h6>
                            <small class="text-muted"></small>
                            <div class="mt-1">
                                <span class="fw-bold" id="unit-price" data-price="">Rs.
                                    </span>
                            </div>
                        </div>
                        <div style="width: 70px;">
                            <input type="number" id="quantity" class="form-control form-control-sm text-center"
                                value="1" min="1" onchange="calculateTotal()">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Merchandise Subtotal</span>
                        <span id="subtotal">Rs. </span>
                    </div>
                    <div class="d-flex justify-content-between mb-2 text-success">
                        <span>Discount</span>
                        <span>Rs. 0.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping Fee</span>
                        <span id="shipping" data-fee="350">Rs. 350.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                        <span>Other Fees</span>
                        <span>Rs. 0.00</span>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="fw-bold">Total Fee</h5>
                        <h5 class="fw-bold text-primary" id="total-price">Rs.
                        </h5>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2.5 fw-semibold rounded-3"
                        style="background: #2563eb;">
                        Proceed to Pay (COD)
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJS')
    <script src="{{ asset('controllers/buy-item.js') }}?v={{ filemtime(public_path('controllers/buy-item.js')) }}"></script>
@endsection
