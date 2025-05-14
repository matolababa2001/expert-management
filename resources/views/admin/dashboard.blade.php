@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Admin Dashboard</h1>

    <div class="mb-4">
        <a href="{{ route('experts.index') }}" class="btn btn-primary">Manage Experts</a>
        <a href="{{ route('skills.index') }}" class="btn btn-secondary">Manage Skills</a>
    </div>

    <hr>

    <h2>Experts</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Skills</th>
                <th>Certificate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($experts as $expert)
            <tr>
                <td>{{ $expert->name }}</td>
                <td>{{ $expert->location }}</td>
                <td>
                    @foreach ($expert->skills as $skill)
                        <span class="badge bg-info text-dark">{{ $skill->name }}</span>
                    @endforeach
                </td>
                <td>
                    @if ($expert->certificate)
                        <a href="{{ asset('storage/certificates/' . $expert->certificate) }}" target="_blank">View PDF</a>
                    @endif
                </td>
                <td>
                    <a href="{{ route('experts.edit', $expert->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('experts.destroy', $expert->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this expert?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('experts.create') }}" class="btn btn-success mt-3">Add New Expert</a>

    <hr>

    <h2>Skills</h2>
    <ul>
        @foreach ($skills as $skill)
            <li>{{ $skill->name }}</li>
        @endforeach
    </ul>
    <a href="{{ route('skills.create') }}" class="btn btn-success mt-2">Add New Skill</a>
</div>
@endsection
