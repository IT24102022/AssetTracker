@extends('layouts.admin')

@section('title', 'Assignment History')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Assignment History
</h1>

<table class="w-full bg-white shadow rounded">

    <thead class="bg-gray-100">

    <tr>

        <th class="p-3">Asset</th>

        <th>Employee</th>

        <th>Assigned</th>

        <th>Returned</th>

        <th>Status</th>

    </tr>

    </thead>

    <tbody>

    @forelse($assignments as $assignment)

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

        <td>

            {{ $assignment->returned_at ?? '-' }}

        </td>

        <td>

            @if($assignment->returned_at)

                <span class="bg-gray-500 text-white px-2 py-1 rounded">

                    Returned

                </span>

            @else

                <span class="bg-green-600 text-white px-2 py-1 rounded">

                    Assigned

                </span>

            @endif

        </td>

    </tr>

    @empty

    <tr>

        <td colspan="5" class="text-center p-6">

            No assignment history.

        </td>

    </tr>

    @endforelse

    </tbody>

</table>

<div class="mt-6">

    {{ $assignments->links() }}

</div>

@endsection