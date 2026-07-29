@extends('layouts.admin')

@section('title', 'Asset Assignments')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Asset Assignments</h1>

    <a href="{{ route('asset-assignments.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">
        Assign Asset
    </a>
</div>



<table class="w-full bg-white shadow rounded">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3">Asset</th>
            <th>Employee</th>
            <th>Assigned Date</th>
            <th>Returned</th>
            <th>Action</th>
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

            @if($assignment->returned_at)

                {{ $assignment->returned_at }}

            @else

                <span class="text-red-600 font-semibold">
                    Not Returned
                </span>

            @endif

        </td>

        <td>

            @if(!$assignment->returned_at)

            <form method="POST"
                  action="{{ route('asset-assignments.return', $assignment) }}">

                @csrf
                @method('PATCH')

                <button
                    class="bg-green-600 text-white px-3 py-1 rounded">

                    Return

                </button>

            </form>

            @endif

        </td>

    </tr>

    @empty

    <tr>

        <td colspan="5" class="text-center p-5">

            No Assignments Found

        </td>

    </tr>

    @endforelse

    </tbody>

</table>

@endsection