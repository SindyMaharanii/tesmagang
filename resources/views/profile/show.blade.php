<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Profile') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <h3>Selamat datang, {{ $user->name }}</h3>

        {{-- Jika ada relasi products --}}
        @if(isset($products))
            <h4>Produk Anda:</h4>
            <ul>
                @foreach($products as $product)
                    <li>{{ $product->name }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</x-app-layout>
