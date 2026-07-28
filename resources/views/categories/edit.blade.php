@extends('layouts.admin')
@section('title','Categories')
@section('content')

<h1 class="text-3xl font-bold mb-6">

    Edit Category

</h1>

@if($errors->any())

<div class="bg-red-200 p-4 rounded mb-4">

    <ul>

        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<form action="{{ route('categories.update',$category) }}"
      method="POST">

    @csrf

    @method('PUT')

    <div class="mb-4">

        <label>Name</label>

        <input
            type="text"
            name="name"
            value="{{ old('name',$category->name) }}"
            class="border p-2 w-full">

    </div>

    <div class="mb-4">

        <label>Description</label>

        <textarea
            name="description"
            class="border p-2 w-full">{{ old('description',$category->description) }}</textarea>

    </div>

    <button
        class="bg-blue-600 text-white px-5 py-2 rounded">

        Update

    </button>

</form>

@endsection