@extends('layouts.app')

@section('content')
<div class="sq-card">
    <div class="sq-card-header">Dashboard</div>

    <div class="sq-card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif You are logged in!
    </div>
</div>
@endsection
