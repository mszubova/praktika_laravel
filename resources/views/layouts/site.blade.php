<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title', 'Narusheniy net')</title>
</head>
<body>

<header class="header">
  <div class="container header__inner">
    <a class="header__logo" href="{{ route('report.index') }}">
      <img src="{{ Vite::asset('resources/img/logo.svg') }}" alt="Нарушений.нет">
    </a>

    <details class="user">
      <summary class="user__summary">
        {{ auth()->user()->name }}
        <span class="user__arrow"></span>
      </summary>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="user__logout">Выйти</button>
      </form>
    </details>
  </div>
</header>

@yield('content')

</body>
</html>
