@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Edit Expert</h1>

    <form action="{{ route('experts.update', $expert->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.experts.partials.form', ['expert' => $expert])
    </form>
</div>
@endsection
