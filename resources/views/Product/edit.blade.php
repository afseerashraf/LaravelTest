

@extends('layouts.master')
@section('title', product edit)
    @lang('translation.dashboards')
@endsection
@section('content')
   
<div class="container mt-4">
    <h2 class="text-center mb-4">Edit Product</h2>

    <form action="{{ route('products.update', encrypt(product->id)) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="code" class="form-label">Product Code</label>
            <input type="text" class="form-control" name="code" value="{{ $product->code }}" required>
            @error('code') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
            @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="sku" class="form-label">Product SKU</label>
            <input type="text" class="form-control" name="sku" value="{{ $product->sku }}" required>
            @error('sku') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Product Price -->
        <div class="mb-3">
            <label for="price" class="form-label">Product Price</label>
            <input type="number" class="form-control" name="price" value="{{ $product->price }}" step="0.01" required>
            @error('price') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" class="form-control" name="image">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100" class="mt-2">
            @endif
            @error('image') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>


@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection






