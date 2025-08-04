@extends('layouts.app')

@section('content')
@vite('resources/css/app.css')

<div class="custom-card product-form">
    <div class="custom-card-header mb-4">
        <i class="fas {{ isset($product) ? 'fa-edit' : 'fa-plus-circle' }} mr-2"></i>
        {{ isset($product) ? 'Edit Product' : 'Add New Product' }}
    </div>

    @if(isset($product))
    <small class="text-sm text-white-400 mb-4">Last updated by: {{ $product->user->name }}</small>
    @endif

    <div class="custom-card-body">
        <form method="POST" action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}">
            @csrf
            @if(isset($product)) @method('PUT') @endif

            <!-- Product Name -->
            <div class="mb-4">
                <label class="block text-white font-medium mb-2">Product Name</label>
                <input type="text" name="name" class="w-full p-3 border border-purple-600 rounded bg-white text-black" 
                       value="{{ old('name', $product->name ?? '') }}" required>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="block text-white font-medium mb-2">Description</label>
                <textarea name="description" rows="3" class="w-full p-3 border border-purple-600 rounded bg-white text-black">{{ old('description', $product->description ?? '') }}</textarea>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label class="block text-white font-medium mb-2">Price</label>
                <input type="number" name="price" class="w-full p-3 border border-purple-600 rounded bg-white text-black" 
                       value="{{ old('price', $product->price ?? '') }}" required>
            </div>

            <!-- Stock -->
            <div class="mb-4">
                <label class="block text-white font-medium mb-2">Stock</label>
                <input type="number" name="stock" class="w-full p-3 border border-purple-600 rounded bg-white text-black" 
                       value="{{ old('stock', $product->stock ?? '') }}" required>
            </div>

            <!-- Buttons -->
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
