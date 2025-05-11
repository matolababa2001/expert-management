
@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">List of Experts</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($experts as $expert)
        <div class="bg-white rounded shadow p-4">
            <img src="{{ asset('storage/' . $expert->photo) }}" class="w-full h-48 object-cover mb-3" alt="Photo of {{ $expert->name }}">
            <h2 class="text-xl font-semibold">{{ $expert->name }}</h2>
            <p><strong>Email:</strong> {{ $expert->email }}</p>
            <p><strong>Location:</strong> {{ $expert->location }}</p>
            <p><strong>Skills:</strong>
                @foreach($expert->skills as $skill)
                    <span class="inline-block bg-gray-200 rounded px-2 py-1 text-sm">{{ $skill->name }}</span>
                @endforeach
            </p>
            @if($expert->certificate)
                <p><a href="{{ asset('storage/' . $expert->certificate) }}" target="_blank" class="text-blue-500 underline">View Certificate</a></p>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection


