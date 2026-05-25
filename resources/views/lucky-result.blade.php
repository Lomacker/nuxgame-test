@extends('layouts.app')

@section('content')

<h1>Lucky Result</h1>

<p>Random number: {{ $result->random_number }}</p>

<p>Result: {{ strtoupper($result->result->value) }}</p>

<p>Win amount: {{ $result->win_amount }}</p>

<a href="{{ route('access.show', ['token' => $link->token]) }}">
    Back
</a>

@endsection
