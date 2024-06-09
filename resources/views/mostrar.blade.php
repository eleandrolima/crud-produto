<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Produto</title>
</head>
<body>

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Produto</h1>
    <p><strong>ID:</strong> {{ $produto->id }}</p>
    <p><strong>Nome:</strong> {{ $produto->nome }}</p>
    <p><strong>Descrição:</strong> {{ $produto->descrição }}</p>
    <p><strong>Preço:</strong> {{ $produto->preço }}</p>
    <a href="{{ route('produto.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
    
</body>
</html>