@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

    <div class="container">
        <h1>Meus eventos</h1>
    </div>
    <div class="col-md10">
        @if (count($events) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                            <td>{{ count($event->users) }}</td>
                            <td>
                                <a href="/events/edit/{{ $event->id }}" class="btn btn-info">
                                    <ion-icon name="create-outline"></ion-icon> Editar
                                </a>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal{{ $event->id }}">
                                    <ion-icon name="trash-outline"></ion-icon>Excluir
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal{{ $event->id }}" tabindex="-1"
                                    aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/events/{{ $event->id }}" method="POST" style="float: left">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">{{ $event->title }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Tem que certeza que deseja excluir <b>{{ $event->title }}</b>
                                                    <p>Essa operação não pode ser desfeita.</p>

                                                    @csrf
                                                    @method('DELETE')

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="btn btn-danger">
                                                        Confirmar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <p>Você ainda não tem eventos</p>
            <a href="/events/create">Criar um novo evento</a>
        @endif
    </div>

    <div class="container">
        <h1>Eventos que estou participando</h1>

        @if (count($eventsAsParticipant) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventsAsParticipant as $event)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                            <td>{{ count($event->users) }}</td>
                            <td>
                                <form action="/events/leave/{{ $event->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <ion-icon name="trash-outline"></ion-icon>sair do evento
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <p>Você ainda não está participando de algum evento</p>
            <p>Veja todos os eventos clicando <a href="/">aqui</a></p>
        @endif
    </div>


@endsection
