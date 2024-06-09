<?php

    namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
    use App\Models\Produto;

    class ProdutoController extends Controller
    {
        // Método para listar todos os produtos
        public function index()
        {
            $produtos = Product::all();
            return view('produtos.index', compact('produtos'));
        }

        // Método para mostrar um produto específico
        public function show($id)
        {
            $produto = Product::findOrFail($id);
            return view('produtos.show', compact('produto'));
        }

        // Método para criar um novo produto
        public function create()
        {
            return view('produtos.create');
        }

        // Método para armazenar um novo produto
        public function store(Request $request)
        {
            $validated = $request->validate([
                'nome' => 'required|string|max:255',
                'descricao' => 'nullable|string',
                'preco' => 'required|numeric',
                'quantidade' => 'required|integer',
            ]);

            ProdutoController::create($validated);

            return redirect()->route('produtos.index');
        }

        // Método para editar um produto
        public function edit($id)
        {
            $produto = ProdutoController::findOrFail($id);
            return view('produtos.edit', compact('produto'));
        }

        // Método para atualizar um produto
        public function update(Request $request, $id)
        {
            $validated = $request->validate([
                'nome' => 'required|string|max:255',
                'descricao' => 'nullable|string',
                'preco' => 'required|numeric',
                'quantidade' => 'required|integer',
            ]);

            $produto = ProdutoController::findOrFail($id);
            $produto->update($validated);

            return redirect()->route('produtos.index');
        }

        // Método para deletar um produto
        public function destroy($id)
        {
            $produto = Produto::findOrFail($id);
            $produto->delete();

            return redirect()->route('produtos.index');
        }
    }