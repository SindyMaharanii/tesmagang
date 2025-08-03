<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Saya</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    @auth
        <div class="p-4 bg-gray-200 flex justify-between">
            <span>{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-600">Logout</button>
            </form>
        </div>
    @endauth

    <div class="p-6">
        {{ $slot }}
    </div>
</body>
</html>
