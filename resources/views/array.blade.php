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
    <h1>Массивы</h1>

    <div class="grid">
        @foreach ($array as $product)
            <article class="card">
                <img
                    class="card__img"
                    src="{{ Vite::asset('resources/img/' . $product['path']) }}"
                    alt="{{ $product['title'] }}"
                >

                <h3 class="card__title">{{ $product['title'] }}</h3>
                <div class="card__price">{{ $product['price'] }} ₽</div>
            </article>
        @endforeach
    </div>
</main>

<footer class="footer">
    <div class="wrap">
        © Зубова Мария Сергеевна, 2026
    </div>
</footer>
@endsection
