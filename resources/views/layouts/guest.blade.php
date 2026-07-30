<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Asset Tracker') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Space+Grotesk:wght@400;500;700&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-ink antialiased">
        <div class="flex min-h-screen flex-col items-center justify-center px-4 py-10">

            <a href="/" class="mb-8 text-center">
                <div class="font-display text-2xl leading-none tracking-tight">ASSET TRACKER</div>
                <div class="mt-1 font-mono text-[11px] uppercase tracking-widest text-ink/50">// inventory manifest</div>
            </a>

            <div class="card-brutal w-full max-w-md p-8">
                {{ $slot }}
            </div>

        </div>
    </body>
</html>
