@extends('layouts.site')


@section('title', 'Создание заявления')

@section('content')
<main class="main">
  <section class="page-content">
    <div class="container">

      <div class="crumbs">
        <a class="crumbs__link" href="{{ route('home') }}">Главная</a>
        <span class="crumbs__sep">&gt;</span>
        <span class="crumbs__current">Создание заявления</span>
      </div>

      
      <form class="claim-form" method="POST" action="{{ route('reports.store') }}">
        @csrf
        <input
          class="field field--small"
          type="text"
          name="number"
          placeholder="Регистрационный номер авто"
          value="{{ old('number') }}"
        >

        <textarea
          class="field field--big"
          name="description"
          placeholder="Описание нарушения"
        >{{ old('description') }}</textarea>

        <button class="btn-create" type="submit">Создать заявление</button>
      </form>

    </div>
  </section>
</main>
@endsection

