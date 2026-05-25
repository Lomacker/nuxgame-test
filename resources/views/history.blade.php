@extends('layouts.app')

@section('content')

<h1>Last 3 results</h1>

@if($results->isEmpty())
    <p>No history yet.</p>
@endif

@foreach($results as $result)
    <div>
        <p>Number: {{ $result->random_number }}</p>

        <p>Result: {{ strtoupper($result->result->value) }}</p>

        <p>Win amount: {{ $result->win_amount }}</p>

        <hr>
    </div>
@endforeach

<a href="{{ route('access.show', $link->token) }}">
    Back
</a>

@endsection
