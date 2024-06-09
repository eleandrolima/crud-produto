<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
</head>
<body>
    
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Produtos</h1>
    <a href="{{ route('produto.create') }}" class="btn btn-primary">Cadastrar Produto</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($produto as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->descrição }}</td>
                    <th>{{ $produto->quantidade }}</th>
                    <th>{{ $product->preço }}</th>
                    <td>
                        <a href="{{ route('produto.show', $produto) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('produto.edit', $produto) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('produto.destroy', $produto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

</body>
</html>