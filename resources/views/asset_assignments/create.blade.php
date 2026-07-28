@extends('layouts.admin')

@section('title', 'Assign Asset')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Assign Asset
</h1>

@if($errors->any())
<div class="bg-red-100 p-4 rounded mb-4">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST"
      action="{{ route('asset-assignments.store') }}">

    @csrf

    <div class="mb-4">

        <label class="block mb-2">Asset</label>

        <select
            name="asset_id"
            class="border p-2 w-full">

            @foreach($assets as $asset)

            <option value="{{ $asset->id }}">

                {{ $asset->asset_code }}
                -
                {{ $asset->name }}

            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-4">

        <label class="block mb-2">Employee</label>

        <select
            name="employee_id"
            class="border p-2 w-full">

            @foreach($employees as $employee)

            <option value="{{ $employee->id }}">

                {{ $employee->name }}

            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-4">

        <label class="block mb-2">

            Assigned Date

        </label>

        <input
            type="date"
            name="assigned_at"
            class="border p-2 w-full"
            value="{{ date('Y-m-d') }}">

    </div>

    <div class="mb-4">

        <label class="block mb-2">

            Notes

        </label>

        <textarea
            name="notes"
            rows="4"
            class="border p-2 w-full"></textarea>

    </div>

    <button
        class="bg-blue-600 text-white px-5 py-2 rounded">

        Assign Asset

    </button>

</form>

@endsection