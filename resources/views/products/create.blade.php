@extends('layouts.app')

@section('content')
<div class="custom-card product-form">
    <div class="custom-card-header mb-4">
        <i class="fas {{ isset($product) ? 'fa-edit' : 'fa-plus-circle' }}"></i>
        {{ isset($product) ? 'Edit Product' : 'Add New Product' }}
    </div>

    <div class="custom-card-body">
        @if(isset($product))
        <p class="edit-info">Last updated by: {{ $product->user->name }}</p>
        @endif

        <form method="POST" action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}">
            @csrf
            @if(isset($product)) @method('PUT') @endif

            <div class="form-group mb-4">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name"
                    value="{{ old('name', $product->name ?? '') }}" required>
            </div>

            <div class="form-group mb-4">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3"
                    required>{{ old('description', $product->description ?? '') }}</textarea>
            </div>

            <div class="form-group mb-4">
                <label class="form-label">Price</label>
                <input type="number" class="form-control" name="price"
                    value="{{ old('price', $product->price ?? '') }}" required>
            </div>

            <div class="form-group mb-4">
                <label class="form-label">Stock</label>
                <input type="number" class="form-control" name="stock"
                    value="{{ old('stock', $product->stock ?? '') }}" required>
            </div>

            <div class="btn-container mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i> {{ isset($product) ? 'Update' : 'Save' }}
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times mr-1"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
