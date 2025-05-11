@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-xl font-bold mb-4">Add New Expert</h2>
    <form action="{{ route('experts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" class="w-full border rounded p-2 mt-1" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" class="w-full border rounded p-2 mt-1" required>
        </div>

        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" name="location" class="w-full border rounded p-2 mt-1" required>
        </div>

        <div class="mb-4">
            <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
            <select name="skills[]" multiple class="w-full border rounded p-2 mt-1">
                @foreach ($skills as $skill)
                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="certificate" class="block text-sm font-medium text-gray-700">Certificate (PDF)</label>
            <input type="file" name="certificate" accept="application/pdf" class="w-full mt-1">
        </div>

        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
            <input type="file" name="photo" accept="image/*" class="w-full mt-1">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Expert</button>
    </form>
</div>
@endsection

