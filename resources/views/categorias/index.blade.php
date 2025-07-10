@extends('layouts.app')
@section('title', 'Categorias')
@section('content')
<h1>Categorias</h1>
<a href="{{ route('categorias.create') }}">Nova Categoria</a>
<table border="1" cellpadding="5" cellspacing="0">
    <tr><th>Nome</th><th>Ações</th></tr>
    @foreach($categorias as $c)
        <tr>
            <td>{{ $c->nome }}</td>
            <td>
                <a href="{{ route('categorias.edit', $c) }}">Editar</a> |
                <form action="{{ route('categorias.destroy', $c) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Excluir?')">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
{{ $categorias->links() }}
@endsection
