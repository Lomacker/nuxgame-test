@extends('layouts.app')

@section('content')

<h1>Register</h1>

<form method="POST" action="/register">
    @csrf

    <div>
        <input
            type="text"
            name="username"
            placeholder="Username"
        >
    </div>

    <div>
        <input
            type="text"
            name="phone_number"
            placeholder="Phone number"
        >
    </div>

    <button type="submit">
        Register
    </button>
</form>

@endsection
