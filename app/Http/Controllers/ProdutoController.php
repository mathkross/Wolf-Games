<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    public function index()
    {
        return view('produto.index')->with('produtos', Produto::all());
    }

    public function create()
    {
        return view('produto.create')->with([
            'categories' => Categoria::all(),
        ]);
    }

    public function store(Request $request)
    {
        $image = "/storage/" . $request->file('image')->store('itens');

        $product = Produto::create([
            'produto_nome' => $request->name,
            'produto_desc' => $request->description,
            'produto_preco' => $request->price,
            'produto_estoque' => $request->stock,
            'categoria_id' => $request->category_id,
            'produto_ativo' => $request->type_id,
            'image' => $image,
        ]);

        session()->flash('success', 'Produto Criado com Sucesso!');
        return redirect(route('produto.index'));
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        session()->flash('success', 'Produto Apagado com Sucesso!');
        return redirect(route('produto.index'));
    }

    public function edit(Produto $produto)
    {
        return view('produto.edit')->with([
            'produto' => $produto,
            'categories' => Categoria::all(),
        ]);
    }

    public function update(Produto $produto, Request $request)
    {
        if ($request->image) {
            $image = "storage/" . $request->file('image')->store('itens');
            $produto->update([
                'produto_nome' => $request->name,
                'produto_desc' => $request->description,
                'produto_preco' => $request->price,
                'produto_estoque' => $request->stock,
                'categoria_id' => $request->category_id,
                'produto_ativo' => $request->type_id,
                'image' => $image,
            ]);
        } else {
            $produto->update([
                'produto_nome' => $request->name,
                'produto_desc' => $request->description,
                'produto_preco' => $request->price,
                'produto_estoque' => $request->stock,
                'categoria_id' => $request->category_id,
                'produto_ativo' => $request->type_id,
            ]);
        }

        session()->flash('success', 'Produto Editado com Sucesso!');
        return redirect(route('produto.index'));
    }

    public function trash()
    {
        return view('produto.trash')->with('produtos', Produto::onlyTrashed()->get());
    }

    public function restore($produto_id)
    {
        $produto = Produto::onlyTrashed()->where('id', $produto_id)->first();
        $produto->restore();
        session()->flash('success', 'Produto restaurado com Sucesso!');
        return redirect(route('produto.index'));
    }
}
