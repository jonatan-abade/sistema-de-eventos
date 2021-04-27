@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
        </form>
    </div>

    <div id="events-container" class="container py-5">
        @if (count($events) > 0)
            <h2>Próximos eventos</h2>
            <p>Veja os eventos dos próximos dias</p>
            <div id="card-container" class="card-group">
                @for ($i = 0; $i < count($events); $i++)

                    <div class="col-4">
                        <div class="card">
                            @php
                                $img = $events[$i]->image;
                                $id = $events[$i]->id;
                                $date = $events[$i]->date;
                                $users = count($events[$i]->users);
                            @endphp
                            <img src="img/events/{{ $img }}" alt="" class="card-img-top">
                            <div class="card-body">
                                <p class="card-date">{{ date('d/m/Y', strtotime($date)) }}</p>
                                <h5 class="card-title">{{ $events[$i]->title }}</h5>
                                <p class="card-participants">{{$users}} Participantes</p>
                                <a href="/events/{{ $id }}" class="btn btn-primary">Saber mais</a>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        @endif
        @if (count($events) == 0 && $search)
            <h2>Não há eventos disponíveis com {{ $search }}</h2>
            <p><a href="/">ver todos</a></p>
        @elseif (count($events) == 0)
            <h2>Não há eventos disponíveis</h2>
            <p><a href="/events/create">Adicione um evento</a></p>
        @endif
    </div>

@endsection
