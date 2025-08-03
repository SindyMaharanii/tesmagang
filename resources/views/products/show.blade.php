@extends('layouts.app')

@section('content')
<div class="custom-card">
    <div class="custom-card-header">
        <i class="fas fa-info-circle"></i> Product Details
    </div>
    <div class="custom-card-body">
        <p><strong>Last updated by:</strong> {{ $product->user->name }}</p>
        <p><strong>Product Name:</strong> {{ $product->name }}</p>
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Price:</strong> <span class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</span></p>
        <p><strong>Stock:</strong> {{ $product->stock }}</p>

        <div class="btn-container mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">← Back</a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">✏️ Edit</a>
        </div>
    </div>
</div>



    
@endsection