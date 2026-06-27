<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Lista todos os livros.
     */
    public function index()
    {
        $livros = Livro::latest()->paginate(10);

        return view('livros.index', compact('livros'));
    }

    /**
     * Mostra o formulario de criacao.
     */
    public function create()
    {
        return view('livros.create');
    }

    /**
     * Salva um novo livro no banco.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'ano_publicacao' => 'nullable|integer|min:1000|max:' . date('Y'),
        ]);

        Livro::create($validated);

        return redirect()
            ->route('livros.index')
            ->with('success', 'Livro cadastrado com sucesso!');
    }

    /**
     * Mostra os detalhes de um livro.
     */
    public function show(Livro $livro)
    {
        return view('livros.show', compact('livro'));
    }

    /**
     * Mostra o formulario de edicao.
     */
    public function edit(Livro $livro)
    {
        return view('livros.edit', compact('livro'));
    }

    /**
     * Atualiza um livro existente.
     */
    public function update(Request $request, Livro $livro)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'ano_publicacao' => 'nullable|integer|min:1000|max:' . date('Y'),
        ]);

        $livro->update($validated);

        return redirect()
            ->route('livros.index')
            ->with('success', 'Livro atualizado com sucesso!');
    }

    /**
     * Remove um livro do banco.
     */
    public function destroy(Livro $livro)
    {
        $livro->delete();

        return redirect()
            ->route('livros.index')
            ->with('success', 'Livro removido com sucesso!');
    }
}
