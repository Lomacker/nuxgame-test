@extends('layouts.app')

@section('content')

<h1>Page A</h1>

<p>Your link is active until: {{ $link->expires_at }}</p>

<p>{{ request()->fullUrl() }}</p>

<form method="POST" action="{{ route('access.regenerate', ['token' => $link->token]) }}">
    @csrf
    <button type="submit">Regenerate link</button>
</form>

<form method="POST" action="{{ route('access.deactivate', ['token' => $link->token]) }}">
    @csrf
    <button type="submit">Deactivate link</button>
</form>

<form method="POST" action="{{ route('lucky.play', ['token' => $link->token]) }}">
    @csrf
    <button type="submit">Imfeelinglucky</button>
</form>

<form method="GET" action="{{ route('lucky.history', ['token' => $link->token]) }}">
    <button type="submit">History</button>
</form>

@endsection
