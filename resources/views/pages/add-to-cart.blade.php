@extends('layouts.master')

@section('customCSS')

@endsection

@section('content')
    <h1>add to cart</h1>

@endsection

@section('customJS')
    <script src="{{ asset('controllers/add-to-cart.js') }}?v={{ filemtime(public_path('controllers/add-to-cart.js')) }}"></script>
@endsection
