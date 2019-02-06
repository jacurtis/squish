@extends('layouts.app')

@section('content')
<div class="container">
  <div class="columns">
    <div class="column is-half is-offset-one-quarter">
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            Log in
          </p>
        </header>
        <div class="card-content">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <b-field label="Email">
              <b-input v-model="email" type="text" name="email" value="{{ old('email') }}" class="{{ $errors->has('email') ? 'is-invalid' : '' }}"></b-input>
            </b-field>
            @if ($errors->has('email'))
              <span class="invalid-feedback text-red text-xs italic" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </span> 
            @endif
            <b-field label="Password">
              <b-input v-model="password" type="password" name="password" value="{{ old('password') }}" class="{{ $errors->has('password') ? 'is-invalid' : '' }}"></b-input>
            </b-field>
            @if ($errors->has('password'))
            <span class="invalid-feedback text-red text-xs italic" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
            </span> 
            @endif
            <div class="mb-6">              
              <div class="field">
                <b-checkbox name="remember">Remember Me</b-checkbox>
              </div>
            </div>
            <div class="columns">
              <div class="column">
                <button class="button is-primary is-fullwidth" type="submit">
                  Sign In
                </button>
              </div>
              <div class="column">
                <a class="button is-text" href="{{ route('password.request') }}">
                  Forgot Password?
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@push('scripts')
<script>
  let app = new Vue({
    el: '#app',
    data: {
      email: '',
      password: ''
    }
  })
</script>
@endpush