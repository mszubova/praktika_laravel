@extends('layouts.app')

@section('title', 'Страница заявлений')

@section('content')
<main class="main">
  <section class="page-content">
    <div class="container">

      <a class="btn-create" href="{{ route('reports.create') }}">
        Создать заявление
      </a>

      <div class="cards">

    @foreach($reports as $report)
        <article class="card">

            <p class="card__date">
                {{ $report->created_at }}
            </p>

            <p class="card__number">
                {{ $report->number }}
            </p>

            <p class="card__text">
                {{ $report->description }}
            </p>

            <form method="POST" action="{{ route('reports.destroy', $report->id) }}">
              @method('delete')
              @csrf
              <input type="submit" value="Удалить">
            </form>
            <a href="{{ route('reports.edit', $report->id) }}">Редактировать</a>




        </article>
    @endforeach

</div>

      

    </div>
  </section>
</main>
@endsection
