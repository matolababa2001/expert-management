@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6">Edit Expert</h1>

    <form action="{{ route('experts.update', $expert->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="form-input mt-1 block w-full" value="{{ $expert->name }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="form-input mt-1 block w-full" value="{{ $expert->email }}" required>
        </div>

        <div class="mb-4">
            <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" name="location" id="location" class="form-input mt-1 block w-full" value="{{ $expert->location }}" required>
        </div>

        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium text-gray-700">Update Photo</label>
            <input type="file" name="photo" id="photo" class="form-input mt-1 block w-full">
            @if($expert->photo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $expert->photo) }}" class="w-32 h-32 object-cover rounded-full" alt="Current Photo">
                </div>
            @endif
        </div>

        <div class="mb-4">
            <label for="certificate" class="block text-sm font-medium text-gray-700">Update Certificate (PDF)</label>
            <input type="file" name="certificate" id="certificate" class="form-input mt-1 block w-full">
            @if($expert->certificate)
                <div class="mt-2">
                    <a href="{{ asset('storage/' . $expert->certificate) }}" class="text-blue-600 underline" target="_blank">Current Certificate</a>
                </div>
            @endif
        </div>

        <div class="mb-4">
            <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
            <select name="skills[]" id="skills" class="form-select mt-1 block w-full" multiple required>
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}" 
                        @if(in_array($skill->id, $expert->skills->pluck('id')->toArray())) selected @endif>
                        {{ $skill->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Expert</button>
    </form>
</div>
@endsection
