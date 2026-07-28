@extends('layouts.admin')
@section('title','Employees')
@section('content')

<h1 class="text-3xl font-bold mb-6">

Create Employee

</h1>

@if ($errors->any())

<div class="bg-red-200 p-4 rounded mb-4">

<ul>

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form method="POST"
      action="{{ route('employees.store') }}">

@csrf

<div class="mb-4">

<label>Employee Code</label>

<input
type="text"
name="emp_code"
class="border p-2 w-full"
value="{{ old('emp_code') }}">

</div>

<div class="mb-4">

<label>Full Name</label>

<input
type="text"
name="name"
class="border p-2 w-full"
value="{{ old('name') }}">

</div>

<div class="mb-4">

<label>Email</label>

<input
type="email"
name="email"
class="border p-2 w-full"
value="{{ old('email') }}">

</div>

<div class="mb-4">

<label>Department</label>

<input
type="text"
name="department"
class="border p-2 w-full"
value="{{ old('department') }}">

</div>

<div class="mb-4">

<label>Status</label>

<select
name="is_active"
class="border p-2 w-full">

<option value="1">

Active

</option>

<option value="0">

Inactive

</option>

</select>

</div>

<button
class="bg-blue-600 text-white px-5 py-2 rounded">

Save Employee

</button>

</form>

@endsection