@extends('layouts.app')

@section('content')
<div class="product-card edit-product-page">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="fas {{ isset($product) ? 'fa-edit' : 'fa-plus-circle' }} mr-2"></i>
            {{ isset($product) ? 'Edit Product' : 'Add New Product' }}
        </h2>
        @if(isset($product))
        <small class="text-muted">Last updated by: {{ $product->user->name }}</small>
        @endif
    </div>

    <form method="POST" action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}">
        @csrf
        @if(isset($product)) @method('PUT') @endif

        <div class="form-group row">
            <label class="col-md-3 col-form-label">Product Name</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="name" 
                       value="{{ old('name', $product->name ?? '') }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 col-form-label">Description</label>
            <div class="col-md-9">
                <textarea class="form-control" name="description" rows="3">{{ old('description', $product->description ?? '') }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 col-form-label">Price</label>
            <div class="col-md-9">
                <input type="number" class="form-control" name="price" 
                       value="{{ old('price', $product->price ?? '') }}" required>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 col-form-label">Stock</label>
            <div class="col-md-9">
                <input type="number" class="form-control" name="stock" 
                       value="{{ old('stock', $product->stock ?? '') }}" required>
            </div>
        </div>

        <div class="form-group row mt-4">
            <div class="col-md-9 offset-md-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i> {{ isset($product) ? 'Update' : 'Save' }}
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times mr-1"></i> Cancel
                </a>
            </div>
        </div>
    </form>
</div>
@endsection