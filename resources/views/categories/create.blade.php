@extends('layouts.admin')
@section('title','Categories')
@section('content')

<h1 class="text-3xl font-bold mb-6">
    Create Category
</h1>

@if ($errors->any())

<div class="bg-red-200 text-red-800 p-4 mb-4 rounded">

    <ul>

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<form action="{{ route('categories.store') }}" method="POST">

    @csrf

    <div class="mb-4">

        <label>Name</label>

        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            class="border w-full p-2"
        >

    </div>

    <div class="mb-4">

        <label>Description</label>

        <textarea
            name="description"
            class="border w-full p-2"
        >{{ old('description') }}</textarea>

    </div>

    <button class="bg-blue-600 text-white px-5 py-2 rounded">

        Save Category

    </button>

</form>

@endsection