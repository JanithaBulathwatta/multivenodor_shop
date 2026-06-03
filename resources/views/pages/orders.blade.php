@extends('layouts.master')

@section('customCSS')
    <style>
        .order-card {
            border: 1px solid #f1f5f9;
            background: #ffffff;
            transition: all 0.25s ease;
        }

        .order-card:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05) !important;
            transform: translateY(-2px);
        }

        .order-img-wrap {
            width: 90px;
            height: 90px;
            background: #f8fafc;
            border-radius: 12px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .order-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .status-badge-pending {
            background-color: #fef3c7;
            color: #d97706;
        }

        .status-badge-shipped {
            background-color: #e0f2fe;
            color: #0369a1;
        }

        .status-badge-delivered {
            background-color: #dcfce7;
            color: #15803d;
        }

        .status-badge-cancelled {
            background-color: #fee2e2;
            color: #b91c1c;
        }
    </style>
@endsection

@section('content')
    <div class="container my-5" style="max-width: 850px;">

        <div class="mb-4">
            <h3 class="fw-bold" style="color: #0f172a;">My Orders</h3>
            <p class="text-muted" style="font-size: 0.9rem;">Check the status of your recent orders and manage them.</p>
        </div>

        <div id="orders-list-container">
            <div class="text-center py-5 text-muted">Loading your orders...</div>
        </div>

    </div>
@endsection

@section('customJS')
    <script src="{{ asset('controllers/orders.js') }}?v={{ filemtime(public_path('controllers/orders.js')) }}"></script>
@endsection
