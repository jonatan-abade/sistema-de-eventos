@extends('layouts.main')
@section('title', $event->title)
@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="imageContainer" class="col-md-6">
                <img width="100%" src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="image-fluid">
            </div>
            <div id="infoContainer" class="col-md-6">
                <h1>{{ $event->title }}</h1>
                <p class="event-city">
                    <ion-icon name="location-outline"></ion-icon>{{ $event->city }}
                </p>
                <p class="events-participants">
                    <ion-icon name="people-outline"></ion-icon>{{ count($event->users) }} Participantes
                </p>
                <p class="events-owner">
                    <ion-icon name="star-outline"></ion-icon>{{ $eventOwner['name'] }}
                </p>
                @if (!$hasUserJoined)
                    <form action="/events/join/{{ $event->id }}" method="POST">
                        @csrf
                        <a href="/events/join/{{ $event->id }}" class="btn btn-primary" onclick="event.preventDefault();
                                                this.closest('form').submit();">Confirmar presença</a>

                    </form>
                @else
                    <p>Ja está participando</p>
                @endif

                <h5 class="mt-2">O evento conta com:</h5>
                <ul style="padding-left:0">
                    @foreach ($event->items as $item)
                        <li style="list-style: none">
                            <ion-icon name="play-outline"></ion-icon> {{ $item }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-12">
                <h3>Sobre o evento:</h3>
                <p>{{ $event->description }}</p>
            </div>
        </div>
    </div>
@endsection
