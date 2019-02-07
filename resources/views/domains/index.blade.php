@extends('layouts.app') 
@section('content')
<div class="sq-card">
  <div class="sq-card-header">
    <span>Domains</span>
    <a href="{{ route('domains.create') }}" class="sq-button sq-is-primary">Add Domain</a>
  </div>

  <div class="sq-card-body sq-contains-table sq-enable-hover">
    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif
    <table class="sq-card-table">
      <thead>
        <tr>
          <th style="width:15%;">Security</th>
          <th>Domain</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($domains as $domain)
          <tr>
            <td>
              <span class="sq-tag {{ $domain->settings['secure'] ? "sq-is-success" : "sq-is-light" }}">
                {{ $domain->settings['secure'] ? "https" : "http" }}
              </span>
            </td>
            <td style="width:100%;">
              <a href="{{ route('domains.edit', $domain->id) }}">
                {{ $domain->domain }}
              </a>
            </td>
            <td>
              <a href="{{ route('domains.edit', $domain->id) }}" class="sq-button sq-is-dark sq-text-right">Configure</a>
            </td>
          </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection