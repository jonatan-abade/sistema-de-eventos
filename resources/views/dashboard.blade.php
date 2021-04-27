@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

    <div class="col-md10 offset-md-1 dashboard-title-container">
        <h1>Meus eventos</h1>
    </div>
    <div class="col-md10 offset-md-1 dashboard-events-container">
        @if (count($events) > 0)
        
        @else
            <p>Você ainda não tem eventos</p>
            <a href="/events/create">Criar um novo evento</a>
        @endif
    </div>


@endsection
