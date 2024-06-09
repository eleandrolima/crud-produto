<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('admin/produto/index', compact('produtos'));
    }

    public function create()
    {
        return view('admin/produto/create');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
        ]);
        Produto::create($request->all());
        return redirect()
            ->route('produto.index')
            ->with('success', 'Produto cadastrado com sucesso!')
        ;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $produto = Produto::find($id);
        return view('admin/produto/show', compact('produto'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $produto = Produto::find($id);
        return view('admin/produto/edit', compact('produto'));
    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $rules = [
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric'
        ];
        $messages= [
            'nome.required' => 'Produto obrigarório.',
            'descricao.required' => 'Produto obrigarório.',
            'quantidade.required' => 'Quantidade obrigarório.',
            'quantidade.integer' => 'Quantidade deve ser número inteiro',
            'preco.required' => 'Preço obrigarório.',
            'preco.numeric' => 'Quantidade deve ser um numérico'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            /** @var \Illuminate\Support\MessageBag $messages */
            $messages = $validator->messages();
            $erro = '';
            foreach ($messages->getMessages() as $message) {
                $erro .= implode(",", $message);
            }
            return redirect()
                ->route('produto.edit', $id)
                ->with('success', $erro)
            ;
        }
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
        ]);
        $produto = Produto::find($id);
        $produto->update($request->all());
        return redirect()
            ->route('produto.index')
            ->with('success', 'Produto editado com sucesso!')
        ;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
            ->route('produto.index')
            ->with('success', 'Produto removido com sucesso!')
        ;
    }
}
