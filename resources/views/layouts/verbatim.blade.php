<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.web_name', 'KnockHQ') }}</title>

  <script src="{{ asset('js/app.js') }}"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="/css/main.css" rel="stylesheet">
  @stack('styles')
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.web_name', 'KnockHQ') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          @auth
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mx-auto">
              <li><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
              <li><a class="nav-link" href="{{ route('circles.index') }}">Circles</a></li>
              <li><a class="nav-link" href="{{ route('mails.index') }}">Mails</a></li>
              <li><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
            </ul>
          @endauth

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
              <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
              <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <main class="py-4">
      <!-- <pre> -->
        <!-- yield('content') -->
      <!-- </pre> -->
      @yield('content')
    </main>
  </div>

  <!-- autosize textareas -->
  <script src="/js/autosize.min.js"></script>
  <script src="/js/autosize_ta.js"></script>

  @stack('scripts')
</body>
</html>
