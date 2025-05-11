@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Manage Experts</h1>

    <a href="{{ route('experts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add New Expert</a>

    @if (session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Location</th>
                <th class="border px-4 py-2">Skills</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($experts as $expert)
                <tr>
                    <td class="border px-4 py-2">{{ $expert->name }}</td>
                    <td class="border px-4 py-2">{{ $expert->email }}</td>
                    <td class="border px-4 py-2">{{ $expert->location }}</td>
                    <td class="border px-4 py-2">
                        {{ $expert->skills->pluck('name')->join(', ') }}
                    </td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('experts.edit', $expert->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('experts.destroy', $expert->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
