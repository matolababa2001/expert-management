
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Admin Dashboard</h1>

    <a href="{{ route('experts.index') }}" class="btn btn-primary mb-3">Manage Experts</a>
    <a href="{{ route('skills.index') }}" class="btn btn-secondary mb-3">Manage Skills</a>
</div>
@endsection
