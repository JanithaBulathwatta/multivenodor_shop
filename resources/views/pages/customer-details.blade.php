@extends('layouts.master')

@section('customCSS')
@endsection

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-lg-4">

                <div class="card shadow border-0 rounded-3">
                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <h4 class="fw-bold text-dark mb-1">Customer Details</h4>
                            <p class="text-muted small">Please fill out the information below</p>
                        </div>

                        <form action="#"  id="frmCustomerForm">

                            <div class="mb-3">
                                <label for="customerName" class="form-label small fw-bold text-secondary">Customer
                                    Name</label>
                                <input type="text" class="form-control form-control-sm py-2 text-dark" id="txtCustomerName"
                                    name="txtCustomerName" placeholder="John Doe" required oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
                            </div>

                            <div class="mb-3">
                                <label for="txtMobile" class="form-label small fw-bold text-secondary">Mobile Number</label>
                                <input type="tel" class="form-control form-control-sm py-2 text-dark" id="txtMobile"
                                    name="txtMobile" placeholder="077XXXXXXX" required>
                            </div>

                            <div class="mb-3">
                                <label for="txtAddress" class="form-label small fw-bold text-secondary">Address</label>
                                <textarea class="form-control form-control-sm py-2 text-dark" id="txtAddress" name="txtAddress" rows="2"
                                    placeholder="Street Address, City" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="postalCode" class="form-label small fw-bold text-secondary">Postal Code</label>
                                <input type="text" class="form-control form-control-sm py-2 text-dark" id="txtPostalCode"
                                    name="txtPostalCode" placeholder="20000" required>
                            </div>

                            <div class="mb-4">
                                <label for="country" class="form-label small fw-bold text-secondary">Country</label>
                                <select class="form-select form-select-sm py-2 text-dark" id="txtCountry" name="txtCountry"
                                    required>
                                    <option value="" selected disabled>Select Country</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Australia">Australia</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                    <option value="India">India</option>
                                </select>
                            </div>

                            <button 
                                class="btn btn-primary w-100 py-2 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2" id="btnSubmit">
                                Submit Details
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('customJS')
    <script
        src="{{ asset('controllers/customer-details.js') }}?v={{ filemtime(public_path('controllers/customer-details.js')) }}">
    </script>
    <script
        src="{{ asset('controllers/add-to-cart.js') }}?v={{ filemtime(public_path('controllers/add-to-cart.js')) }}">
    </script>
@endsection
