@extends('layouts.app')
@section('title', 'Editar Gasto')
@section('content')

<h1>Editar Gasto</h1>

<form method="POST" action="{{ route('gastos.update', $gasto) }}">
    @csrf
    @method('PUT')

    <label>Descrição:</label><br>
    <input type="text" name="descricao" value="{{ old('descricao', $gasto->descricao) }}"><br><br>

    <label>Valor:</label><br>
    <input type="number" name="valor" step="0.01" value="{{ old('valor', $gasto->valor) }}"><br><br>

    <label>Data:</label><br>
    <input type="date" name="data" value="{{ old('data', $gasto->data) }}"><br><br>

    <label>Categoria:</label><br>
    <select name="categoria_id">
        @foreach($categorias as $cat)
            <option value="{{ $cat->id }}" @if($cat->id == $gasto->categoria_id) selected @endif>
                {{ $cat->nome }}
            </option>
        @endforeach
    </select><br><br>

    <button type="submit">Atualizar</button>
</form>

@endsection
