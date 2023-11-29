<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Produto;

class CartController extends Controller
{
    public function index(){
        $itens = Cart::where('user_id',Auth()->user()->id)->get();
        return view('cart.index')->with('itens', $itens);
    }

    public function store(produto $produto){
        $user = auth()->user();

        $cart = Cart::where([
            'user_id' => $user->id,
            'produto_id' => $produto->id])->first();

        //Se o produto já estiver no carrinho
        if($cart){
            $cart->update([
                'units' => $cart->units + 1
            ]);
        }else{
            $cart = Cart::create([
                'user_id' => $user->id,
                'produto_id' => $produto->id,
                'units' => 1
            ]);
        }
        session()->flash('success', 'O produto ('.$produto->name.') foi adicionada ao carrinho de compras.');
        return redirect()->back();
    }


    public function destroy(produto $produto){
        $user = Auth()->user();
        $cart = Cart::where([
            'user_id' => $user->id,
            'produto_id' => $produto->id])->first();

        if(!$cart){
            session()->flash('error', 'O produto ('.$produto->name.') não está no carrinho.');
            return redirect()->back();
        }

        if($cart->units > 1){
            $cart->update([
                'units' => $cart->units - 1
            ]);
        }else{
            $cart->delete();
        }

        session()->flash('success', 'O produto ('.$produto->name.') foi removido do carrinho.');
        return redirect()->back();
    }

}
