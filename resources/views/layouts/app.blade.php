<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  {{--
  <link rel="dns-prefetch" href="https://fonts.gstatic.com"> --}}

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/icons.css') }}" rel="stylesheet">
</head>

<body>
  <div id="app">
    <div class="container">
      <nav class="sq-main-header">
        <div class="sq-row">
          <div class="sq-col">
            <a href="{{ route('dashboard') }}">
              <img src="{{ asset('svg/squish.svg') }}">
            </a>
          </div>
          <div class="sq-col sq-text-right">
            <button class="sq-button sq-is-primary">
              <i class="zi zi-add-outline m-r-10"></i>
              Squish New Link
            </button>
          </div>
        </div>
      </nav>
    </div>

    <main class="sq-main sq-m-t-25">
      <div class="container">
        <div class="sq-row">
          <aside id="sq-main-sidebar" class="sq-col-2">
            <ul class="sq-sidebar-nav">
              <li class="sq-nav-item">
                <a href="{{ route('dashboard') }}" class="sq-sidebar-nav-link {{ Nav::isRoute('dashboard') }}">
                  <i class="zi-dashboard"></i>
                  Dashboard
                </a>
              </li>
              <li class="sq-nav-item">
                <a href="" class="sq-sidebar-nav-link">
                  <i class="zi-link"></i>
                  Squished Links
                </a>
              </li>
              <li class="sq-nav-item">
                <a href="" class="sq-sidebar-nav-link">
                  <i class="zi-paste"></i>
                  Reports
                </a>
              </li>
              <li class="sq-nav-item">
                <a href="" class="sq-sidebar-nav-link">
                  <i class="zi-servers"></i>
                  Domains
                </a>
              </li>
              <li class="sq-nav-item">
                <a href="" class="sq-sidebar-nav-link">
                  <i class="zi-cog"></i>
                  Settings
                </a>
              </li>
              <hr> @auth
              <li class="sq-nav-item">
                <a class="sq-sidebar-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="zi-close-outline"></i>
                  Logout
                </a>
                <!-- Logout Form -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
              @endauth
            </ul>
          </aside>
          <div class="sq-col-10">
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
