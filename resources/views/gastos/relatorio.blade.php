@extends('layouts.app')
@section('title', 'Relatório de Gastos')
@section('content')
<h1>Relatório de Gastos</h1>
<form method="GET" action="{{ route('gastos.relatorio') }}">
    <label>Início: <input type="date" name="inicio" value="{{ $inicio }}"></label>
    <label>Fim: <input type="date" name="fim" value="{{ $fim }}"></label>
    <button type="submit">Filtrar</button>
</form>

@if(isset($gastos))
    <h2>Total: R$ {{ number_format($total, 2, ',', '.') }}</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr><th>Data</th><th>Descrição</th><th>Categoria</th><th>Valor</th></tr>
        @foreach($gastos as $g)
            <tr>
                <td>{{ \Carbon\Carbon::parse($g->data)->format('d/m/Y') }}</td>
                <td>{{ $g->descricao }}</td>
                <td>{{ $g->categoria->nome }}</td>
                <td>R$ {{ number_format($g->valor, 2, ',', '.') }}</td>
            </tr>
        @endforeach
    </table>
@endif
@endsection
