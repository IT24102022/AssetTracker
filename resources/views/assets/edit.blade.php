@extends('layouts.admin')

@section('title', 'Edit Asset')

@section('content')

<h1 class="text-3xl font-bold mb-6">Edit Asset</h1>

@if ($errors->any())
    <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('assets.update', $asset) }}">
    @csrf
    @method('PUT')

    <!-- Asset Code -->
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Asset Code</label>
        <input
            type="text"
            name="asset_code"
            value="{{ old('asset_code', $asset->asset_code) }}"
            class="border rounded w-full p-2">
    </div>

    <!-- Asset Name -->
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Asset Name</label>
        <input
            type="text"
            name="name"
            value="{{ old('name', $asset->name) }}"
            class="border rounded w-full p-2">
    </div>

    <!-- Category -->
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Category</label>

        <select name="category_id" class="border rounded w-full p-2">

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ old('category_id', $asset->category_id) == $category->id ? 'selected' : '' }}>

                    {{ $category->name }}

                </option>

            @endforeach

        </select>
    </div>

    <!-- Serial Number -->
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Serial Number</label>
        <input
            type="text"
            name="serial_number"
            value="{{ old('serial_number', $asset->serial_number) }}"
            class="border rounded w-full p-2">
    </div>

    <!-- Purchase Date -->
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Purchase Date</label>
        <input
            type="date"
            name="purchase_date"
            value="{{ old('purchase_date', $asset->purchase_date) }}"
            class="border rounded w-full p-2">
    </div>

    <!-- Cost -->
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Cost</label>
        <input
            type="number"
            step="0.01"
            name="cost"
            value="{{ old('cost', $asset->cost) }}"
            class="border rounded w-full p-2">
    </div>

    <!-- Status -->
    <div class="mb-6">
        <label class="block mb-2 font-semibold">Status</label>

        <select name="status" class="border rounded w-full p-2">

            @foreach(['Available', 'Assigned', 'Maintenance', 'Retired'] as $status)

                <option
                    value="{{ $status }}"
                    {{ old('status', $asset->status) == $status ? 'selected' : '' }}>

                    {{ $status }}

                </option>

            @endforeach

        </select>
    </div>

    <button
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">

        Update Asset

    </button>

</form>

@endsection