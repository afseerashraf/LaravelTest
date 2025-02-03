@extends('layouts.master')
@section('title', Product List)
    @lang('translation.dashboards')
@endsection
@section('content')
   

<div class="container mt-4">
    <h2 class="text-center mb-4">Product List</h2>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>SKU</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>${{ $product->price }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="50">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.edit', encrypt($product->id)) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('products.destroy', encrypt($product->id)) }}" class="btn btn-warning btn-sm">Delete</a>
                        <a href="{{ route('products.show', encrypt($product->id)) }}" class="btn btn-warning btn-sm">Edit</a>

                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $products->links() }}
</div>


@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection













