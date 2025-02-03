@extends('layouts.master')
@section('title', show product)
@lang('translation.dashboards')
@endsection
@section('content')

<div class="container">
    <h2>Product Details</h2>
    <p><strong>Code:</strong> {{ $product->code }}</p>
    <p><strong>Name:</strong> {{ $product->name }}</p>
    <p><strong>SKU:</strong> {{ $product->sku }}</p>
    <p><strong>Price:</strong> ${{ $product->price }}</p>
    <p><strong>Image</strong>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="50">
        @else
            No Image
        @endif
    </p>
    <a href="{{ route('products.index') }}" class="btn btn-primary">Back to List</a>
</div>


@endsection
@section('script')
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection