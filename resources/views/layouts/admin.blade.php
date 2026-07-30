<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Tracker — @yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Space+Grotesk:wght@400;500;700&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="font-sans text-ink antialiased">



<div class="flex min-h-screen">

    <!-- Sidebar — reads like a manifest / packing-slip stub -->
    <aside class="w-64 shrink-0 bg-ink text-paper">

        <div class="border-b-2 border-paper/20 p-6">
            <div class="font-display text-xl leading-none tracking-tight">
                ASSET<br>TRACKER
            </div>
            <div class="mt-2 font-mono text-[11px] uppercase tracking-widest text-tag">
                // inventory manifest
            </div>
        </div>

        <nav class="py-2">
            @php
                $links = [
                    ['route' => 'dashboard', 'label' => 'Dashboard', 'num' => '01'],
                    ['route' => 'assets.index', 'label' => 'Assets', 'num' => '02'],
                    ['route' => 'categories.index', 'label' => 'Categories', 'num' => '03'],
                    ['route' => 'employees.index', 'label' => 'Employees', 'num' => '04'],
                    ['route' => 'asset-assignments.index', 'label' => 'Assignments', 'num' => '05'],
                    ['route' => 'assignment-history', 'label' => 'History', 'num' => '06'],
                ];
            @endphp

            @foreach ($links as $link)
                <a href="{{ route($link['route']) }}"
                   class="nav-brutal {{ request()->routeIs($link['route']) || (str_contains($link['route'], '.') && request()->routeIs(explode('.', $link['route'])[0].'.*')) ? 'is-active' : '' }}">
                    <span class="text-[10px] opacity-60">{{ $link['num'] }}</span>
                    <span>{{ $link['label'] }}</span>
                </a>
            @endforeach
        </nav>
    </aside>

    <!-- Main -->
    <main class="flex-1">

        <header class="flex items-center justify-between border-b-3 border-ink bg-paper px-8 py-5">

            <h2 class="font-display text-2xl uppercase tracking-tight">
                @yield('title')
            </h2>

            <div class="flex items-center gap-4">
                <span class="stamp stamp-mute">
                    {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-brutal-danger !px-4 !py-2">
                        Logout
                    </button>
                </form>
            </div>

        </header>

        <section class="p-8">

            @if (session('success'))
                <div class="card-brutal mb-6 flex items-center gap-3 !border-go !shadow-none bg-go/10 px-5 py-4">
                    <span class="stamp stamp-go">OK</span>
                    <span class="font-mono text-sm">{{ session('success') }}</span>
                </div>
            @endif

            @yield('content')

        </section>

    </main>

</div>

</body>
</html>
