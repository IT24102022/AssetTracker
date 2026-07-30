@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">

    <div class="card-brutal p-6">
        <h3 class="font-mono text-xs font-bold uppercase tracking-widest text-ink/60">01 / Total Assets</h3>
        <p class="mt-2 font-display text-5xl">{{ $totalAssets }}</p>
    </div>

    <div class="card-brutal !border-go bg-go p-6 text-paper">
        <h3 class="font-mono text-xs font-bold uppercase tracking-widest text-paper/70">02 / Available</h3>
        <p class="mt-2 font-display text-5xl">{{ $availableAssets }}</p>
    </div>

    <div class="card-brutal !border-wire bg-wire p-6 text-paper">
        <h3 class="font-mono text-xs font-bold uppercase tracking-widest text-paper/70">03 / Assigned</h3>
        <p class="mt-2 font-display text-5xl">{{ $assignedAssets }}</p>
    </div>

    <div class="card-brutal !border-ink bg-tag p-6 text-ink">
        <h3 class="font-mono text-xs font-bold uppercase tracking-widest text-ink/70">04 / Maintenance</h3>
        <p class="mt-2 font-display text-5xl">{{ $maintenanceAssets }}</p>
    </div>

</div>

<div class="mt-6 grid grid-cols-1 gap-5 md:grid-cols-2">

    <div class="card-brutal p-6">
        <h3 class="font-mono text-xs font-bold uppercase tracking-widest text-ink/60">Employees</h3>
        <p class="mt-2 font-display text-5xl">{{ $totalEmployees }}</p>
    </div>

    <div class="card-brutal p-6">
        <h3 class="font-mono text-xs font-bold uppercase tracking-widest text-ink/60">Categories</h3>
        <p class="mt-2 font-display text-5xl">{{ $totalCategories }}</p>
    </div>

</div>

<div class="card-brutal mt-6">

    <div class="border-b-3 border-ink px-6 py-4">
        <h3 class="font-display text-lg uppercase tracking-tight">Recent Assignments</h3>
    </div>

    <table class="w-full">

        <thead>
        <tr class="border-b-3 border-ink bg-ink text-paper">
            <th class="p-3 text-left font-mono text-xs uppercase tracking-widest">Asset</th>
            <th class="p-3 text-left font-mono text-xs uppercase tracking-widest">Employee</th>
            <th class="p-3 text-left font-mono text-xs uppercase tracking-widest">Assigned Date</th>
        </tr>
        </thead>

        <tbody>
        @forelse ($recentAssignments as $assignment)
            <tr class="border-b-2 border-ink/15">
                <td class="p-3 font-mono text-sm">{{ $assignment->asset->name }}</td>
                <td class="p-3 font-mono text-sm">{{ $assignment->employee->name }}</td>
                <td class="p-3 font-mono text-sm">{{ $assignment->assigned_at }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="p-8 text-center font-mono text-sm text-ink/50">
                    NO ASSIGNMENTS YET.
                </td>
            </tr>
        @endforelse
        </tbody>

    </table>

</div>

@endsection
