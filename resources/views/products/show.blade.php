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
<div class="flex flex-wrap items-center gap-4 mt-6">
    <a href="{{ route('products.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
        ← Back
    </a>

    <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        ✏️ Edit
    </a>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            🗑️ Delete
        </button>
    </form>
</div>


    </div>
</div>
@endsection