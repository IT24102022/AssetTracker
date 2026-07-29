@extends('layouts.admin')

@section('title', 'Assets')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Assets</h1>

    <a href="{{ route('assets.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Add Asset
    </a>
    <a href="{{ route('export.assets') }}"
   class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
    Export Excel
</a>
    
</div>

<!-- Search & Filter -->
<form method="GET" class="mb-6 grid grid-cols-1 md:grid-cols-5 gap-4">

    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Search by Code, Name or Serial..."
        class="border rounded px-3 py-2">

    <select
        name="category"
        class="border rounded px-3 py-2">

        <option value="">All Categories</option>

        @foreach($categories as $category)

            <option
                value="{{ $category->id }}"
                @selected(request('category') == $category->id)>

                {{ $category->name }}

            </option>

        @endforeach

    </select>

    <select
        name="status"
        class="border rounded px-3 py-2">

        <option value="">All Status</option>

        <option
            value="Available"
            @selected(request('status') == 'Available')>

            Available

        </option>

        <option
            value="Assigned"
            @selected(request('status') == 'Assigned')>

            Assigned

        </option>

        <option
            value="Maintenance"
            @selected(request('status') == 'Maintenance')>

            Maintenance

        </option>

        <option
            value="Retired"
            @selected(request('status') == 'Retired')>

            Retired

        </option>

    </select>

    <button
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white rounded px-4">

        Search

    </button>

    <a
        href="{{ route('assets.index') }}"
        class="bg-gray-500 hover:bg-gray-600 text-white rounded px-4 flex items-center justify-center">

        Reset

    </a>

</form>

@if($assets->count())

<div class="mb-3 text-gray-600">

    Showing <strong>{{ $assets->total() }}</strong> asset(s)

</div>

<div class="bg-white rounded-lg shadow overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-200">

                <tr>

                    <th class="p-3 text-left">Code</th>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Category</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Cost</th>
                    <th class="p-3 text-center">Actions</th>

                </tr>

            </thead>

            <tbody>

            @foreach($assets as $asset)

                <tr class="border-t hover:bg-gray-50">

                    <td class="p-3">
                        {{ $asset->asset_code }}
                    </td>

                    <td class="p-3">
                        {{ $asset->name }}
                    </td>

                    <td class="p-3">
                        {{ optional($asset->category)->name }}
                    </td>

                    <td class="p-3">

                        @switch($asset->status)

                            @case('Available')

                                <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">

                                    Available

                                </span>

                                @break

                            @case('Assigned')

                                <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm">

                                    Assigned

                                </span>

                                @break

                            @case('Maintenance')

                                <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm">

                                    Maintenance

                                </span>

                                @break

                            @case('Retired')

                                <span class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm">

                                    Retired

                                </span>

                                @break

                            @default

                                <span class="bg-gray-300 text-gray-700 px-3 py-1 rounded-full text-sm">

                                    {{ $asset->status }}

                                </span>

                        @endswitch

                    </td>

                    <td class="p-3">

                        ${{ number_format($asset->cost, 2) }}

                    </td>

                    <td class="p-3 text-center">

                        <a
                            href="{{ route('assets.edit', $asset) }}"
                            class="text-blue-600 hover:underline mr-3">

                            Edit

                        </a>

                        <form
                            action="{{ route('assets.destroy', $asset) }}"
                            method="POST"
                            class="inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                onclick="return confirm('Are you sure you want to delete this asset?')"
                                class="text-red-600 hover:underline">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

<div class="mt-6">

    {{ $assets->links() }}

</div>

@else

<div class="bg-white rounded-lg shadow p-8 text-center">

    <p class="text-gray-500 text-lg">

        No assets found.

    </p>

    <a
        href="{{ route('assets.create') }}"
        class="inline-block mt-5 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">

        Add Your First Asset

    </a>

</div>

@endif

@endsection