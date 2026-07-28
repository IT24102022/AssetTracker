@extends('layouts.admin')

@section('title', 'Assets')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Assets</h1>

    <a href="{{ route('assets.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Add Asset
    </a>
</div>

@if($assets->count())

<div class="bg-white rounded-lg shadow overflow-hidden">

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

                @endswitch

            </td>

            <td class="p-3">
                ${{ number_format($asset->cost, 2) }}
            </td>

            <td class="p-3 text-center">

                <a href="{{ route('assets.edit', $asset) }}"
                   class="text-blue-600 hover:underline mr-3">
                    Edit
                </a>

                <form action="{{ route('assets.destroy', $asset) }}"
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

@else

<div class="bg-white rounded-lg shadow p-6 text-center">

    <p class="text-gray-500">No assets found.</p>

    <a href="{{ route('assets.create') }}"
       class="inline-block mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Add Your First Asset
    </a>

</div>

@endif

@endsection