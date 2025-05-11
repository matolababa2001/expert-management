@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Add Expert</h1>

    <form action="{{ route('experts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.experts.partials.form', ['expert' => null])
    </form>
</div>
@endsection
