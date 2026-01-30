@extends('layouts.site')

@section('title', 'Страница заявлений')

@section('content')
<main class="main">
  <section class="page-content">
    <div class="container">

      <a class="btn-create" href="{{ route('reports.create') }}">
  Создать заявление
</a>

<div class="controls">

  <div class="controls__group">
    <p class="controls__title">Сортировка по дате:</p>
    <div class="controls__buttons">
      <a class="chip" href="{{ route('report.index', ['sort' => 'desc', 'status' => $status]) }}">сначала новые</a>
      <a class="chip" href="{{ route('report.index', ['sort' => 'asc', 'status' => $status]) }}">сначала старые</a>
    </div>
  </div>

  <div class="controls__group">
    <p class="controls__title">Фильтр по статусу:</p>
    <div class="controls__buttons">
      <a class="chip chip--ghost" href="{{ route('report.index', ['sort' => $sort]) }}">показать все</a>

      @foreach($statuses as $statusItem)
        <a class="chip" href="{{ route('report.index', ['sort' => $sort, 'status' => $statusItem->id]) }}">
          {{ $statusItem->name }}
        </a>
      @endforeach
    </div>
  </div>

</div>

      <div class="cards">

    @foreach($reports as $report)
        <article class="card">

            <p class="card__date">
                {{ $report->created_at }}</p>
            <p class="card__number">
                {{ $report->number }}</p>
            <p class="card__text">
                {{ $report->description }}</p>
            <p class="card__status">Статус заявления - <span class="status">{{ $report->status->name }}</span></p>


            <form method="POST" action="{{ route('reports.destroy', $report->id) }}">
              @method('delete')
              @csrf
              <input type="submit" value="Удалить">
            </form>
            <a href="{{ route('reports.edit', $report->id) }}">Редактировать</a>




        </article>
    @endforeach
    {{$reports->links()}}

</div>

      

    </div>
  </section>
</main>
@endsection
