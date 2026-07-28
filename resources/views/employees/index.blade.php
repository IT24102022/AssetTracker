@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <h1 class="text-3xl font-bold">
        Employees
    </h1>

    <a href="{{ route('employees.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

        Add Employee

    </a>

</div>

@if(session('success'))

<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">

    {{ session('success') }}

</div>

@endif

<table class="w-full bg-white shadow rounded">

    <thead class="bg-gray-200">

    <tr>

        <th class="p-3">Employee Code</th>
        <th>Name</th>
        <th>Email</th>
        <th>Department</th>
        <th>Status</th>
        <th width="180">Actions</th>

    </tr>

    </thead>

    <tbody>

    @forelse($employees as $employee)

    <tr class="border-t">

        <td class="p-3">{{ $employee->emp_code }}</td>

        <td>{{ $employee->name }}</td>

        <td>{{ $employee->email }}</td>

        <td>{{ $employee->department }}</td>

        <td>

            @if($employee->is_active)

                <span class="bg-green-500 text-white px-3 py-1 rounded">

                    Active

                </span>

            @else

                <span class="bg-red-500 text-white px-3 py-1 rounded">

                    Inactive

                </span>

            @endif

        </td>

        <td>

            <a href="{{ route('employees.edit',$employee) }}"
               class="bg-yellow-500 text-white px-3 py-1 rounded">

                Edit

            </a>

            <form action="{{ route('employees.destroy',$employee) }}"
                  method="POST"
                  class="inline">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Delete this employee?')"
                    class="bg-red-600 text-white px-3 py-1 rounded">

                    Delete

                </button>

            </form>

        </td>

    </tr>

    @empty

    <tr>

        <td colspan="6" class="text-center p-5">

            No Employees Found

        </td>

    </tr>

    @endforelse

    </tbody>

</table>

@endsection