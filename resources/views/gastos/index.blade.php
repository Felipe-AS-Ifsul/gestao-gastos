@extends('layouts.app')
@section('title', 'Meus Gastos')
@section('content')
<h1>Meus Gastos</h1>
<a href="{{ route('gastos.create') }}">Novo Gasto</a>
<table border="1" cellpadding="5" cellspacing="0">
    <tr><th>Descrição</th><th>Categoria</th><th>Valor</th><th>Data</th><th>Ações</th></tr>
    @foreach($gastos as $g)
        <tr>
            <td>{{ $g->descricao }}</td>
            <td>{{ $g->categoria->nome }}</td>
            <td>R$ {{ number_format($g->valor, 2, ',', '.') }}</td>
            <td>{{ \Carbon\Carbon::parse($g->data)->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('gastos.edit', $g) }}">Editar</a> |
                <form action="{{ route('gastos.destroy', $g) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Excluir?')">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
{{ $gastos->links() }}
@endsection
