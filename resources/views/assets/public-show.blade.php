<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Asset Details</title>

    @vite(['resources/css/app.css'])

</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center py-8">

<div class="w-full max-w-lg bg-white rounded-2xl shadow-xl overflow-hidden">

    <!-- Header -->
    <div class="bg-blue-600 text-white text-center py-5">

        <h1 class="text-2xl font-bold">
            Asset Details
        </h1>

        <p class="text-blue-100 text-sm mt-1">
            Asset Information
        </p>

    </div>

    <!-- Body -->
    <div class="p-6 space-y-5">

        <div>
            <p class="text-gray-500 text-sm">Asset Code</p>
            <p class="text-lg font-semibold">{{ $asset->asset_code }}</p>
        </div>

        <div>
            <p class="text-gray-500 text-sm">Asset Name</p>
            <p class="text-lg font-semibold">{{ $asset->name }}</p>
        </div>

        <div>
            <p class="text-gray-500 text-sm">Category</p>
            <p class="text-lg">{{ optional($asset->category)->name }}</p>
        </div>

        <div>
            <p class="text-gray-500 text-sm">Serial Number</p>
            <p class="text-lg">{{ $asset->serial_number }}</p>
        </div>

        <div>
            <p class="text-gray-500 text-sm">Purchase Date</p>
            <p class="text-lg">
                {{ \Carbon\Carbon::parse($asset->purchase_date)->format('d M Y') }}
            </p>
        </div>

        <div>
            <p class="text-gray-500 text-sm">Cost</p>
            <p class="text-lg font-semibold">
                ${{ number_format($asset->cost, 2) }}
            </p>
        </div>

        <div>

            <p class="text-gray-500 text-sm mb-2">
                Status
            </p>

            @switch($asset->status)

                @case('Available')
                    <span class="bg-green-500 text-white px-4 py-1 rounded-full text-sm">
                        Available
                    </span>
                    @break

                @case('Assigned')
                    <span class="bg-blue-500 text-white px-4 py-1 rounded-full text-sm">
                        Assigned
                    </span>
                    @break

                @case('Maintenance')
                    <span class="bg-yellow-500 text-white px-4 py-1 rounded-full text-sm">
                        Maintenance
                    </span>
                    @break

                @case('Retired')
                    <span class="bg-gray-500 text-white px-4 py-1 rounded-full text-sm">
                        Retired
                    </span>
                    @break

                @default
                    <span class="bg-gray-300 text-gray-800 px-4 py-1 rounded-full text-sm">
                        {{ $asset->status }}
                    </span>

            @endswitch

        </div>

    </div>

    <!-- Footer -->
    <div class="bg-gray-100 text-center py-4">

        <p class="text-xs text-gray-500">
            Asset Tracker System
        </p>

    </div>

</div>

</body>

</html>