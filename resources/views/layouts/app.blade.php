<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Manager</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .profile-section {
            display: flex;
            align-items: center;
        }

        .profile-name {
            margin-right: 10px;
            color: white;
        }

        .profile-dropdown {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            min-width: 150px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a,
        .dropdown-content form button {
            color: black;
            padding: 10px 16px;
            text-decoration: none;
            display: block;
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            cursor: pointer;
        }

        .dropdown-content a:hover,
        .dropdown-content form button:hover {
            background-color: #f1f1f1;
        }

        .profile-dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 py-2">
        <div class="navbar-container">
            <a class="navbar-brand text-white" href="{{ url('/') }}">
                <i class="fas fa-box-open mr-2"></i>Product Manager
            </a>

            <ul style="list-style: none; display: flex; gap: 1rem; margin: 0; padding: 0;">
                <li><a class="text-white" href="{{ route('products.index') }}">Produk</a></li>
                <li><a class="text-white" href="{{ route('profile.show') }}">Profil</a></li>
            </ul>

            @auth
            <div class="profile-dropdown text-white">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random" class="profile-img">
                 <span class="mr-2">{{ Auth::user()->name }}</span>
               

                <!-- Dropdown -->
                <div class="dropdown-content">
                    <a href="{{ route('profile.edit') }}">Edit Profil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content py-4 px-4">
        <div class="product-container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer bg-light text-center py-3">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Product Management System</p>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const profileDropdown = document.querySelector('.profile-dropdown');
            const dropdownContent = profileDropdown?.querySelector('.dropdown-content');

            if (profileDropdown && dropdownContent) {
                profileDropdown.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
                });

                document.addEventListener('click', function() {
                    dropdownContent.style.display = 'none';
                });
            }
        });
    </script>
</body>
</html>
