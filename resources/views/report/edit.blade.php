@extends('layouts.site')


@section('title', 'Редактирование заявления')

@section('content')
<main class="main">
  <section class="page-content">
    <div class="container">

      <div class="crumbs">
        <a class="crumbs__link" href="{{ route('report.index') }}">Главная</a>
        <span class="crumbs__sep">&gt;</span>
        <span class="crumbs__current">Редактирование заявления</span>
      </div>

      <form class="claim-form" method="POST" action="{{ route('reports.update', $report->id) }}">
        @csrf
        @method('put')

        <input
          class="field field--small"
          type="text"
          name="number"
          placeholder="Регистрационный номер авто"
          value="{{ old('number', $report->number) }}"
        >

        <textarea
          class="field field--big"
          name="description"
          placeholder="Описание нарушения"
        >{{ old('description', $report->description) }}</textarea>

        <button class="btn-create" type="submit">Обновить</button>
      </form>

    </div>
  </section>
</main>
@endsection
