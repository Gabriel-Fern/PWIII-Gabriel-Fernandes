@extends('layouts.app')

@section('content')
    <h1>Livros</h1>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <a href="{{ route('livros.create') }}">+ Novo Livro</a>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Ano</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($livros as $livro)
                <tr>
                    <td>{{ $livro->titulo }}</td>
                    <td>{{ $livro->autor }}</td>
                    <td>{{ $livro->ano_publicacao }}</td>
                    <td>
                        <a href="{{ route('livros.show', $livro) }}">Ver</a>
                        <a href="{{ route('livros.edit', $livro) }}">Editar</a>
                        <form action="{{ route('livros.destroy', $livro) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum livro cadastrado ainda.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $livros->links() }}
    </div>
@endsection
