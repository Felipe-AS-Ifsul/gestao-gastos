@extends('layouts.app')
@section('title', 'Novo Gasto')
@section('content')
<h1>{{ isset($gasto) ? 'Editar Gasto' : 'Novo Gasto' }}</h1>
<form action="{{ isset($gasto) ? route('gastos.update', $gasto) : route('gastos.store') }}" method="POST">
    @csrf
    @isset($gasto) @method('PUT') @endisset
    <label>Descrição:
        <input type="text" name="descricao" value="{{ old('descricao', $gasto->descricao ?? '') }}">
    </label><br>
    <label>Valor:
        <input type="number" step="0.01" name="valor" value="{{ old('valor', $gasto->valor ?? '') }}">
    </label><br>
    <label>Data:
        <input type="date" name="data" value="{{ old('data', $gasto->data ?? '') }}">
    </label><br>
    <label>Categoria:
        <select name="categoria_id">
            <option value="">-- selecione --</option>
            @foreach($categorias as $c)
                <option value="{{ $c->id }}" {{ (old('categoria_id', $gasto->categoria_id ?? '') == $c->id) ? 'selected' : '' }}>
                    {{ $c->nome }}
                </option>
            @endforeach
        </select>
    </label><br>
    <button type="submit">Salvar</button>
</form>
@endsection
