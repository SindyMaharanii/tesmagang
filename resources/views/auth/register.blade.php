@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-black flex items-center justify-center px-4">
    <div class="bg-gray-800 text-white rounded-xl shadow-lg p-8 w-[460px]">
        <h2 class="text-4xl font-bold text-center mb-8">Daftar</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-5">
                <label for="name" class="block text-lg font-medium mb-2">Nama</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full px-4 py-3 rounded-md bg-gray-700 text-white text-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="email" class="block text-lg font-medium mb-2">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-3 rounded-md bg-gray-700 text-white text-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="block text-lg font-medium mb-2">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-3 rounded-md bg-gray-700 text-white text-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror">
                @error('password')
                    <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password_confirmation" class="block text-lg font-medium mb-2">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full px-4 py-3 rounded-md bg-gray-700 text-white text-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white text-lg font-semibold py-3 rounded-md transition">
                Daftar
            </button>

            <p class="mt-6 text-center text-base">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-400 hover:underline">Masuk</a>
            </p>
        </form>
    </div>
</div>
@endsection
