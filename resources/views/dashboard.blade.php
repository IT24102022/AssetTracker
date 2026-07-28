@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <div class="bg-white shadow rounded p-6">
        <h3 class="text-gray-500">Total Assets</h3>
        <p class="text-4xl font-bold">{{ $totalAssets }}</p>
    </div>

    <div class="bg-green-100 shadow rounded p-6">
        <h3 class="text-green-700">Available</h3>
        <p class="text-4xl font-bold">{{ $availableAssets }}</p>
    </div>

    <div class="bg-blue-100 shadow rounded p-6">
        <h3 class="text-blue-700">Assigned</h3>
        <p class="text-4xl font-bold">{{ $assignedAssets }}</p>
    </div>

    <div class="bg-yellow-100 shadow rounded p-6">
        <h3 class="text-yellow-700">Maintenance</h3>
        <p class="text-4xl font-bold">{{ $maintenanceAssets }}</p>
    </div>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

    <div class="bg-white shadow rounded p-6">
        <h3 class="text-xl font-semibold mb-4">Employees</h3>
        <p class="text-4xl font-bold">{{ $totalEmployees }}</p>
    </div>

    <div class="bg-white shadow rounded p-6">
        <h3 class="text-xl font-semibold mb-4">Categories</h3>
        <p class="text-4xl font-bold">{{ $totalCategories }}</p>
    </div>

</div>

<div class="bg-white shadow rounded mt-8">

    <div class="p-6 border-b">

        <h3 class="text-xl font-semibold">

            Recent Assignments

        </h3>

    </div>

    <table class="w-full">

        <thead class="bg-gray-100">

        <tr>

            <th class="p-3 text-left">Asset</th>
            <th class="text-left">Employee</th>
            <th class="text-left">Assigned Date</th>

        </tr>

        </thead>

        <tbody>

        @forelse($recentAssignments as $assignment)

        <tr class="border-t">

            <td class="p-3">

                {{ $assignment->asset->name }}

            </td>

            <td>

                {{ $assignment->employee->name }}

            </td>

            <td>

                {{ $assignment->assigned_at }}

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="3" class="text-center p-6">

                No assignments yet.

            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection