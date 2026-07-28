@extends('layouts.admin')
@section('title','Employees')
@section('content')

<h1 class="text-3xl font-bold mb-6">

    Edit Employee

</h1>

@if($errors->any())

<div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-5">

    <ul>

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<form action="{{ route('employees.update',$employee) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">

        <label>Employee Code</label>

        <input
            type="text"
            name="emp_code"
            value="{{ old('emp_code',$employee->emp_code) }}"
            class="border p-2 w-full rounded">

    </div>

    <div class="mb-4">

        <label>Full Name</label>

        <input
            type="text"
            name="name"
            value="{{ old('name',$employee->name) }}"
            class="border p-2 w-full rounded">

    </div>

    <div class="mb-4">

        <label>Email</label>

        <input
            type="email"
            name="email"
            value="{{ old('email',$employee->email) }}"
            class="border p-2 w-full rounded">

    </div>

    <div class="mb-4">

        <label>Department</label>

        <input
            type="text"
            name="department"
            value="{{ old('department',$employee->department) }}"
            class="border p-2 w-full rounded">

    </div>

    <div class="mb-4">

        <label>Status</label>

        <select
            name="is_active"
            class="border p-2 w-full rounded">

            <option value="1"
                {{ $employee->is_active ? 'selected' : '' }}>
                Active
            </option>

            <option value="0"
                {{ !$employee->is_active ? 'selected' : '' }}>
                Inactive
            </option>

        </select>

    </div>

    <button
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">

        Update Employee

    </button>

</form>

@endsection