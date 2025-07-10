@extends('layouts.app')
@section('title', isset($categoria) ? 'Editar Categoria' : 'Nova Categoria')
@section('content')
<h1>{{ isset($categoria) ? 'Editar Categoria' : 'Nova Categoria' }}</h1>
<form action="{{ isset($categoria) ? route('categorias.update', $categoria) : route('categorias.store') }}" method="POST">
    @csrf
    @isset($categoria) @method('PUT') @endisset
    <label>Nome:
        <input type="text" name="nome" value="{{ old('nome', $categoria->nome ?? '') }}">
    </label><br>
    <button type="submit">Salvar</button>
</form>
@endsection
