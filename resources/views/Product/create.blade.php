@extends('layouts.master')
@section('title', 'create')
    @lang('translation.dashboards')
@endsection
@section('content')
   
<div class="card shadow p-4">
        <h3 class="text-center mb-4">Create Product</h3>
        
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="code" class="form-label">Product Code</label>
                <input type="text" class="form-control" name="code" placeholder="Enter product code" required>
                @error('code') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter product name" required>
                @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="sku" class="form-label">SKU</label>
                <input type="text" class="form-control" name="sku" placeholder="Enter SKU" required>
                @error('sku') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Enter price" step="0.01" required>
                @error('price') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" class="form-control" name="image">
                @error('image') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

        


@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection









    