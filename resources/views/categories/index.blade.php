@extends('layouts.admin')
@section('title','Categories')
@section('content')

<h1 class="text-3xl font-bold mb-6">Categories</h1>

<a href="{{ route('categories.create') }}"
   class="bg-blue-600 text-white px-4 py-2 rounded">
    Add Category
</a>

<table class="table-auto w-full mt-6 bg-white shadow">

    <thead class="bg-gray-200">

    <tr>
        <th class="p-3">ID</th>
        <th>Name</th>
        <th>Description</th>
        <th width="220">Actions</th>
    </tr>

    </thead>

    <tbody>

    @forelse($categories as $category)

    <tr class="border-t">

        <td class="p-3">{{ $category->id }}</td>

        <td>{{ $category->name }}</td>

        <td>{{ $category->description }}</td>

        <td>

            <a href="{{ route('categories.edit',$category) }}"
               class="bg-yellow-500 text-white px-3 py-1 rounded">
                Edit
            </a>

            <form action="{{ route('categories.destroy',$category) }}"
                  method="POST"
                  class="inline">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Delete this category?')"
                    class="bg-red-600 text-white px-3 py-1 rounded">

                    Delete

                </button>

            </form>

        </td>

    </tr>

    @empty

    <tr>

        <td colspan="4" class="text-center p-5">

            No Categories Found

        </td>

    </tr>

    @endforelse

    </tbody>

</table>

@endsection