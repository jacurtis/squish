<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com"> --}}

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
</head>

<body>
  <div id="app">
    <div class="sq-m-t-30 container">
      <nav class="sq-main-header sq-border-b-0 sq-flex sq-justify-center">
        <div class="sq-row">
          <div class="sq-col">
            <img src="{{ asset('svg/squish.svg') }}" style="height:50px;">
          </div>
          {{-- <div class="sq-col text-right">
            <button class="button is-primary">
              <i class="zi zi-add-outline m-r-10"></i>
              Squish New Link
            </button>
          </div> --}}
        </div>
      </nav>
    </div>

    <main class="main sq-m-t-25">
      <div class="container">
        <div class="sq-row sq-is-centered">
          <div class="sq-col-6">
            @yield('content')
          </div>
        </div>
      </div>
    </main>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  @stack('scripts')

</body>

</html>
