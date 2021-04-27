@extends('layouts.main')
@section('title', 'Criar evento')
@section('content')


<form action="/events" method="POST" class="container col-6 py-5" enctype="multipart/form-data">
    @csrf
    <h1>Crie seu evento</h1>
    <div class="mb-3">
        <label for="image" class="form-label">Imagem do evento</label>
        <input class="form-control" type="file" id="image" name="image">
      </div>
    <div class="mb-3">
      <label for="title" class="form-label">Titulo</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
    </div>

    <div class="mb-3">
      <label for="date" class="form-label">Data do evento</label>
      <input type="date" class="form-control" id="date" name="date">
    </div>

    <div class="mb-3">
        <label for="city" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Cidade do evento">
    </div>

    <div class="mb-3">
        <label for="private" class="form-label">O evento é privado?</label>
        <select name="private" id="private" class="form-select">
            <option selected disabled>Selecione uma opção?</option>
            <option value="0">Não</option>
            <option value="1">Sim</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <textarea class="form-control" id="description" name="description" style="height: 100px"></textarea>
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

    <button type="submit" class="btn btn-primary">Criar evento</button>
  </form>

@endsection