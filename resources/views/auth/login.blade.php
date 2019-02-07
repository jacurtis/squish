@extends('layouts.app-auth')

@section('content')
<div class="container">
  <div class="columns">
    <div class="column is-half is-offset-one-quarter">
      <div class="sq-card">
        <header class="sq-card-header">
          Log in
        </header>
        <div class="sq-card-body">
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
              <div class="field sq-p-t-10">
                <b-checkbox name="remember">Remember Me</b-checkbox>
              </div>
            </div>
            <div class="columns sq-m-t-10">
              <div class="column">
                <button class="sq-button sq-is-primary sq-is-fullwidth" type="submit">
                  Sign In
                </button>
              </div>
            </div>
          </form>
        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->
      <div class="columns sq-m-t-10">
        <div class="column sq-text-center">
          <a class="sq-button sq-is-small sq-is-text" href="{{ route('password.request') }}">
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