@extends('layouts.admin')

@section('title', 'Add Asset')

@section('content')

<h1 class="text-3xl font-bold mb-6">Add New Asset</h1>

@if ($errors->any())
    <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('assets.store') }}">
    @csrf

    <!-- Asset Code -->
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Asset Code</label>
        <input type="text"
               name="asset_code"
               value="{{ old('asset_code') }}"
               class="border rounded w-full p-2">
    </div>

    <!-- Asset Name -->
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Asset Name</label>
        <input type="text"
               name="name"
               value="{{ old('name') }}"
               class="border rounded w-full p-2">
    </div>

    <!-- Category -->
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Category</label>

        <select name="category_id" class="border rounded w-full p-2">

            <option value="">-- Select Category --</option>

            @foreach($categories as $category)

                <option value="{{ $category->id }}">

                    {{ $category->name }}

                </option>

            @endforeach

        </select>
    </div>

    <!-- Serial Number -->
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Serial Number</label>
        <input type="text"
               name="serial_number"
               value="{{ old('serial_number') }}"
               class="border rounded w-full p-2">
    </div>

    <!-- Purchase Date -->
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Purchase Date</label>
        <input type="date"
               name="purchase_date"
               value="{{ old('purchase_date') }}"
               class="border rounded w-full p-2">
    </div>

    <!-- Cost -->
    <div class="mb-4">
        <label class="block mb-2 font-semibold">Cost</label>
        <input type="number"
               step="0.01"
               name="cost"
               value="{{ old('cost') }}"
               class="border rounded w-full p-2">
    </div>

    <!-- Status -->
    <div class="mb-6">
        <label class="block mb-2 font-semibold">Status</label>

        <select name="status" class="border rounded w-full p-2">

            <option value="Available">Available</option>
            <option value="Assigned">Assigned</option>
            <option value="Maintenance">Maintenance</option>
            <option value="Retired">Retired</option>

        </select>
    </div>

    <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">
        Save Asset
    </button>

</form>

@endsection