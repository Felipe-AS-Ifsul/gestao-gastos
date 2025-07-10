<?php
namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function index() {
        $gastos = Gasto::with('categoria')->latest()->paginate(10);
        return view('gastos.index', compact('gastos'));
    }

    public function create() {
        $categorias = Categoria::orderBy('nome')->get();
        return view('gastos.create', compact('categorias'));
    }

    public function store(Request $request) {
        $request->validate([
            'descricao' => 'required',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id',
        ]);
        Gasto::create($request->only(['descricao', 'valor', 'data', 'categoria_id']));
        return redirect()->route('gastos.index')->with('success', 'Criado!');
    }

    public function edit(Gasto $gasto) {
        $categorias = Categoria::orderBy('nome')->get();
        return view('gastos.edit', compact('gasto', 'categorias'));
    }

    public function update(Request $request, Gasto $gasto) {
        $request->validate([
            'descricao' => 'required',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id',
        ]);
        $gasto->update($request->only(['descricao', 'valor', 'data', 'categoria_id']));
        return redirect()->route('gastos.index')->with('success', 'Atualizado!');
    }

    public function destroy(Gasto $gasto) {
        $gasto->delete();
        return redirect()->route('gastos.index')->with('success', 'Excluído!');
    }

    public function relatorio(Request $request) {
        $inicio = $request->inicio;
        $fim = $request->fim;
        $gastos = Gasto::with('categoria')
            ->when($inicio && $fim, fn($q) => $q->whereBetween('data', [$inicio, $fim]))
            ->get();
        $total = $gastos->sum('valor');
        return view('gastos.relatorio', compact('gastos', 'total', 'inicio', 'fim'));
    }
}
