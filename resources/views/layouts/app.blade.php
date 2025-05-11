<!DOCTYPE html>
<html>
<head>
    <title>Expert Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <nav class="bg-white shadow mb-6">
        <div class="container mx-auto px-6 py-4 flex justify-between">
            <a href="/" class="text-lg font-bold">Expert System</a>
            <div>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-blue-500 mr-4">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="text-red-500">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-500 mr-4">Login</a>
                    <a href="{{ route('register') }}" class="text-blue-500">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6">
        @yield('content')
    </main>
</body>
</html>
