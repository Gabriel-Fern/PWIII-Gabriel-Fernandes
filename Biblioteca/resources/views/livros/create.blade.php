@extends('layouts.app')

@section('content')
    <h1>Novo Livro</h1>

    <form action="{{ route('livros.store') }}" method="POST">
        @csrf

        <label for="titulo">Título do livro: </label>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}">
        @error('titulo')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="autor">Autor do livro : </label>
        <input type="text" id="autor" name="autor" value="{{ old('autor') }}">
        @error('autor')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="ano_publicacao">Ano de Publicação do livro: </label>
        <input type="number" id="ano_publicacao" name="ano_publicacao" value="{{ old('ano_publicacao') }}">
        @error('ano_publicacao')
            <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit" class="btn-submit">Salvar</button>
    </form>

    <p style="margin-top: 15px;"><a href="{{ route('livros.index') }}">&larr; Voltar para a lista</a></p>
@endsection
