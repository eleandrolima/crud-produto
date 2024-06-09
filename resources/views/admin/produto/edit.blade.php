<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>

@extends('layout.app')

@section('content')
<div class="container">
    <h1>Editar Produto</h1>
    @if(session('success'))
        <div class="alert alert-success" style="margin-top: 10px;">{{ session('success') }}</div>
    @endif
    <form action="{{ route('produto.update', $produto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao">{{ $produto->descricao }}</textarea>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <textarea class="form-control" id="quantidade" name="quantidade">{{ $produto->quantidade }}</textarea>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="{{ $produto->preco }}" required>
        </div>
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('produto.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>
@endsection
    
</body>
</html>