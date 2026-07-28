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
    <div class="flex items-center gap-6">

    <a href="{{ url('/') }}" class="font-bold text-xl">
        Asset Tracker
    </a>

    @auth

        <a href="{{ route('categories.index') }}"
           class="hover:text-gray-200">

            Categories

        </a>

        <a href="{{ route('employees.index') }}"
           class="hover:text-gray-200">

            Employees

        </a>

    @endauth

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