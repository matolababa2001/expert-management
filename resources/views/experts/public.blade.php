@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-2xl font-bold mb-4">Available Experts</h1>
    <div class="grid md:grid-cols-3 gap-6">
        @foreach ($experts as $expert)
            <div class="bg-white p-4 shadow rounded">
                @if ($expert->photo)
                    <img src="{{ asset('storage/' . $expert->photo) }}" alt="{{ $expert->name }}" class="w-full h-48 object-cover mb-3">
                @endif
                <h2 class="text-lg font-semibold">{{ $expert->name }}</h2>
                <p class="text-sm text-gray-600">{{ $expert->location }}</p>
                <p class="text-sm"><strong>Skills:</strong> {{ $expert->skills->pluck('name')->join(', ') }}</p>
                @if ($expert->certificate)
                    <a href="{{ asset('storage/' . $expert->certificate) }}" class="text-blue-600 text-sm" target="_blank">View Certificate</a>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
