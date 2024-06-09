<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Produto</h1>
    <form action="{{ route('produto.update', $produto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $produto->name }}" required>
        </div>
        <div class="form-group">
            <label for="descrição">Descrição</label>
            <textarea class="form-control" id="descrição" name="descrição">{{ $produto->descrição }}</textarea>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <textarea class="form-control" id="description" name="quantidade">{{ $produto->descrição }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Preço</label>
            <input type="number" step="0.01" class="form-control" id="preço" name="preço" value="{{ $produto->preço }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
    
</body>
</html>