@extends('layouts.app')

@section('title', 'Expert List')

@section('content')
    <h1 class="text-xl font-bold mb-4">Expert List</h1>

    @if(session('success'))
        <div class="bg-green-100 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <a href="{{ route('experts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Expert</a>

    <table class="table-auto w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border p-2">Name</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Skills</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($experts as $expert)
                <tr>
                    <td class="border p-2">{{ $expert->name }}</td>
                    <td class="border p-2">{{ $expert->email }}</td>
                    <td class="border p-2">
                        {{ $expert->skills->pluck('name')->join(', ') }}
                    </td>
                    <td class="border p-2">
                        <a href="{{ route('experts.edit', $expert->id) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('experts.destroy', $expert->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Delete this expert?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
