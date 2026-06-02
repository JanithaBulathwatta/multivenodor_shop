@extends('layouts.master')

@section('customCSS')
@endsection

@section('content')
    <h1>orders</h1>
@endsection

@section('customJS')
    <script src="{{ asset('controllers/orders.js') }}?v={{ filemtime(public_path('controllers/orders.js')) }}"></script>
@endsection
