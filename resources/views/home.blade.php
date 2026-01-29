@extends('layouts.app')

@section('content')
<header class="header">
    <div class="wrap header__inner">
        <div class="logo">
            <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="Логотип">
        </div>

        <nav class="menu">
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('array') }}">Массивы</a>
        </nav>
    </div>
</header>

<main class="wrap content">
    <h1>Главная</h1>

    <img class="hero" src="{{ Vite::asset('resources/img/img1.png') }}" alt="Картинка">

    <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Itaque quasi sequi officiis sapiente, quia molestiae, reiciendis quaerat pariatur magnam nobis, quas exercitationem consequatur soluta nihil repudiandae eius eum hic perferendis?
    </p>
</main>

<footer class="footer">
    <div class="wrap">
        © Зубова Мария Сергеевна, 2026
    </div>
</footer>
@endsection
