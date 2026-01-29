<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'НАРУШЕНИЙ.НЕТ')</title>
</head>
<body>

<header class="header">
  <div class="container header__inner">
    <a class="header__logo" href="{{ route('home') }}">
      <img src="{{ Vite::asset('resources/img/logo.svg') }}" alt="Нарушений.нет">
    </a>

    <details class="user">
      <summary class="user__summary">
        Носова Ольга Петровна
        <span class="user__arrow"></span>
      </summary>

      <a class="user__logout" href="#">Выйти</a>
    </details>
  </div>
</header>

@yield('content')

</body>
</html>
