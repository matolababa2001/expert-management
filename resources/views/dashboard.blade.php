@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to the Dashboard</h1>
    <p>You are logged in as {{ Auth::user()->name }}</p>
</div>
@endsection
