@extends('layouts.admin')
@section('title','Employees')
@section('content')

<div class="flex justify-between items-center mb-6">

<h1 class="text-3xl font-bold">

Employees

</h1>

<a
href="{{ route('employees.create') }}"
class="bg-blue-600 text-white px-4 py-2 rounded">

Add Employee

</a>

</div>

<table class="table-auto w-full bg-white shadow">

<thead class="bg-gray-200">

<tr>

<th class="p-3">Code</th>
<th>Name</th>
<th>Email</th>
<th>Department</th>
<th>Status</th>

</tr>

</thead>

<tbody>

@forelse($employees as $employee)

<tr class="border-t">

<td class="p-3">

{{ $employee->emp_code }}

</td>

<td>

{{ $employee->name }}

</td>

<td>

{{ $employee->email }}

</td>

<td>

{{ $employee->department }}

</td>

<td>

@if($employee->is_active)

<span class="bg-green-500 text-white px-2 py-1 rounded">

Active

</span>

@else

<span class="bg-red-500 text-white px-2 py-1 rounded">

Inactive

</span>

@endif

</td>

</tr>

@empty

<tr>

<td colspan="5"
class="text-center p-5">

No Employees

</td>

</tr>

@endforelse

</tbody>

</table>

@endsection