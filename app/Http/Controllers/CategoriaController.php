<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::orderBy('nome')->paginate(10);
        return view('categorias.index', compact('categorias'));
    }

    public function create() {
        return view('categorias.create');
    }

    public function store(Request $request) {
        $request->validate(['nome' => 'required|unique:categorias,nome']);
        Categoria::create($request->only('nome'));
        return redirect()->route('categorias.index')->with('success', 'Criado!');
    }

    public function edit(Categoria $categoria) {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria) {
        $request->validate(['nome' => 'required']);
        $categoria->update($request->only('nome'));
        return redirect()->route('categorias.index')->with('success', 'Atualizado!');
    }

    public function destroy(Categoria $categoria) {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Excluído!');
    }
}
