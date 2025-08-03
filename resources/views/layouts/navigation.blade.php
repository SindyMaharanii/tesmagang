
<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-xl font-semibold text-gray-900">
                    My App
                </a>
            </div>
            <div class="flex items-center">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-3 py-2 text-sm font-medium">Dashboard</a>
                     <a href="{{ route('profile.show') }}" class="ml-4 px-3 py-2 text-sm font-medium">Profil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                           <button type="submit" class="text-sm text-gray-700 hover:text-red-600">Logout</button>
                        </button>
                    </form>
            
                @else
                    <a href="{{ route('login') }}" class="px-3 py-2 text-sm font-medium">Login</a>
                    <a href="{{ route('register') }}" class="ml-4 px-3 py-2 text-sm font-medium">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
