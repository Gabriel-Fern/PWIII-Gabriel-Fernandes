@extends('layouts.app')

@section('content')
    <h1>{{ $livro->titulo }}</h1>

    <p><strong>Autor:</strong> {{ $livro->autor }}</p>
    <p><strong>Ano de Publicação:</strong> {{ $livro->ano_publicacao ?? 'Não informado' }}</p>
    <p><strong>Cadastrado em:</strong> {{ $livro->created_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('livros.edit', $livro) }}">Editar</a>
    <a href="{{ route('livros.index') }}">&larr; Voltar para a lista</a>
@endsection
