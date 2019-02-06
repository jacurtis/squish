@extends('layouts.app')

@section('content')
<div class="container m-t-50">
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
              <div class="field m-t-15">
                <b-checkbox name="remember">Remember Me</b-checkbox>
              </div>
            </div>
            <div class="columns m-t-15">
              <div class="column">
                <button class="button is-primary is-fullwidth" type="submit">
                  Sign In
                </button>
              </div>
            </div>
          </form>
        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->
      <div class="columns m-t-15">
        <div class="column text-center">
          <a class="button is-small is-text" href="{{ route('password.request') }}">
            Forgot Your Password?
          </a>
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