@extends('layouts.app')

@section('content')
    <h1>Editar Livro</h1>

    <form action="{{ route('livros.update', $livro) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $livro->titulo) }}">
        @error('titulo')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="autor">Autor</label>
        <input type="text" id="autor" name="autor" value="{{ old('autor', $livro->autor) }}">
        @error('autor')
            <span class="error">{{ $message }}</span>
        @enderror

        <label for="ano_publicacao">Ano de Publicação</label>
        <input type="number" id="ano_publicacao" name="ano_publicacao" value="{{ old('ano_publicacao', $livro->ano_publicacao) }}">
        @error('ano_publicacao')
            <span class="error">{{ $message }}</span>
        @enderror

        <button type="submit" class="btn-submit">Atualizar</button>
    </form>

    <p style="margin-top: 15px;"><a href="{{ route('livros.index') }}">&larr; Voltar para a lista</a></p>
@endsection
