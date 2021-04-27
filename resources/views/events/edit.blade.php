@extends('layouts.main')
@section('title', 'Editando' . $event->title)
@section('content')

    <form action="/events/update/{{ $event->id }}" method="POST" class="container col-6 py-5"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>Editando: {{ $event->title }}</h1>
        <div class="mb-3">
            <label for="image" class="form-label">Imagem do evento</label>
            <input class="form-control" type="file" id="image" name="image">
            <img width="100px" src="/img/events/{{ $event->image }}" alt="">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento"
                value="{{ $event->title }}">
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Data do evento</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}">
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade do evento" value="{{ $event->city }}">
        </div>

        <div class="mb-3">
            <label for="private" class="form-label">O evento é privado?</label>
            <select name="private" id="private" class="form-select">
                <option value="0">Não</option>
                <option value="1" {{ $event->private == 1 ? "selected" : ""}}>Sim</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea class="form-control" id="description" name="description" style="height: 100px">{{ $event->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="itens" class="form-label">Adicione itens de infraestrutura</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="cadeiras"> Cadeiras |
                <input type="checkbox" name="items[]" value="Palco"> Palco |
                <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis |
                <input type="checkbox" name="items[]" value="Open food"> Open food |
                <input type="checkbox" name="items[]" value="Brinds"> Brinds
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Editar evento</button>
    </form>

@endsection
