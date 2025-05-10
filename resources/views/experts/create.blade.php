@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Expert</h1>

    <form method="POST" action="{{ route('experts.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Expert Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="skills" class="form-label">Select Skills</label>
            <select name="skills[]" multiple class="form-control">
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save Expert</button>
    </form>
</div>
@endsection
