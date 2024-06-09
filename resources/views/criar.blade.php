<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRIAR TABELA</title>
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Produto</h1>
    <form action="{{ route('produto.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <textarea class="form-control" id="description" name="quantidade"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Preço</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection
    
</body>
</html>