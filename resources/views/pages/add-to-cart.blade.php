@extends('layouts.master')

@section('customCSS')
@endsection

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white border-bottom py-3">
                        <h4 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                            <i class="bi bi-cart3 text-primary"></i> Shopping Cart Items
                        </h4>
                    </div>

                    <div class="card-body p-0" id="cart-items-container">
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('customJS')
    <script src="{{ asset('controllers/add-to-cart.js') }}?v={{ filemtime(public_path('controllers/add-to-cart.js')) }}">
    </script>
@endsection
