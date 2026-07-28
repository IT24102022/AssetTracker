<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Tracker</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->

    <aside class="w-64 bg-slate-900 text-white">

        <div class="p-6 text-2xl font-bold border-b border-slate-700">

            Asset Tracker

        </div>

        <nav class="p-4 space-y-2">

            <a href="{{ route('dashboard') }}"
               class="block p-3 rounded hover:bg-slate-700">
                Dashboard
            </a>

            <a href="{{ route('categories.index') }}"
               class="block p-3 rounded hover:bg-slate-700">
                Categories
            </a>

            <a href="{{ route('employees.index') }}"
               class="block p-3 rounded hover:bg-slate-700">
                Employees
            </a>

          

        </nav>

    </aside>

    <!-- Main -->

    <main class="flex-1">

        <header class="bg-white shadow p-5 flex justify-between">

            <h2 class="text-xl font-semibold">

                @yield('title')

            </h2>

            <div>

                {{ auth()->user()->name }}

            </div>

        </header>

        <section class="p-8">

            @if(session('success'))

                <div class="bg-green-200 p-4 rounded mb-5">

                    {{ session('success') }}

                </div>

            @endif

            @yield('content')

        </section>

    </main>

</div>

</body>
</html>