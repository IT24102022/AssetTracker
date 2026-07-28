<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Tracker</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<nav class="bg-blue-600 text-white p-4">
    <div class="container mx-auto flex justify-between">

        <a href="{{ url('/') }}" class="font-bold text-xl">
            Asset Tracker
        </a>

        <div>

            @auth

                <span class="mr-4">
                    Welcome, {{ Auth::user()->name }}
                </span>

                <form action="{{ route('logout') }}"
                      method="POST"
                      class="inline">

                    @csrf

                    <button class="bg-red-500 px-3 py-1 rounded">
                        Logout
                    </button>

                </form>

            @else

                <a href="{{ route('login') }}" class="mr-4">
                    Login
                </a>

                <a href="{{ route('register') }}">
                    Register
                </a>

            @endauth

        </div>

    </div>
</nav>

<div class="container mx-auto mt-8">

    @if(session('success'))

        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">

            {{ session('success') }}

        </div>

    @endif

    @yield('content')

</div>

</body>
</html>