<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Demand;
use App\Models\DemandCart;

class CartController extends Controller
{
    public function index(){
        $itens = Cart::where('user_id',Auth()->user()->id)->get();
        return view('cart.index')->with('itens', $itens);
    }

    public function demand(){
        $itens = DemandCart::where('user_id',Auth()->user()->id)->get();
        return view('cart.demand')->with('itens', $itens);
    }


    public function store(Product $product){
        $user = auth()->user();

        $cart = Cart::where([
            'user_id' => $user->id,
            'product_id' => $product->id])->first();

        //Se o produto já estiver no carrinho
        if($cart){
            $cart->update([
                'units' => $cart->units + 1
            ]);
        }else{
            $cart = Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'units' => 1
            ]);
        }
        session()->flash('success', 'A ('.$product->name.') foi adicionada.');
        return redirect()->back();
    }

    public function storeD(Demand $demand){
        $user = auth()->user();

        $cart = DemandCart::where([
            'user_id' => $user->id,
            'demand_id' => $demand->id])->first();

        //Se a assinatura já estiver no carrinho
        if($cart){
            $cart->update([
                'units' => $cart->units + 1
            ]);
        }else{
            $cart = DemandCart::create([
                'user_id' => $user->id,
                'demand_id' => $demand->id,
                'units' => 1
            ]);
        }
        session()->flash('success', 'A ('.$demand->name.') foi adicionada.');
        return redirect()->back();
    }
    

    

    public function destroy(Product $product){
        $user = Auth()->user();
        $cart = Cart::where([
            'user_id' => $user->id,
            'product_id' => $product->id])->first();

        if(!$cart){
            session()->flash('error', 'O produto ('.$product->name.') não está no carrinho.');
            return redirect()->back();
        }

        if($cart->units > 1){
            $cart->update([
                'units' => $cart->units - 1
            ]);
        }else{
            $cart->delete();
        }

        session()->flash('success', 'O produto ('.$product->name.') foi removido do carrinho.');
        return redirect()->back();
    }

    public function destroyD(Demand $demand){
        $user = Auth()->user();
        $cart = DemandCart::where([
            'user_id' => $user->id,
            'demand_id' => $demand->id])->first();

        if(!$cart){
            session()->flash('error', 'A assinatura ('.$demand->name.') não está no carrinho.');
            return redirect()->back();
        }

        if($cart->units > 1){
            $cart->update([
                'units' => $cart->units - 1
            ]);
        }else{
            $cart->delete();
        }

        session()->flash('success', 'A assinatura ('.$demand->name.') foi removida do carrinho.');
        return redirect()->back();
    }
}
