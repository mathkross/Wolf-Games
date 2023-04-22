<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
    public function index(){
        return view('order.index')->with('orders', Order::where('user_id',Auth()->user()->id)->get());
    }

    public function store(Request $request){
        $order = Order::create([
            'user_id' => Auth()->user()->id,
            'zipcode' => $request->zipcode,
            'address' => $request->address,
            'city'    => $request->city,
            'state'   => $request ->state

        ]);


        $cart = Cart::where('user_id', Auth()->user()->id);
        foreach($cart->get() as $item){
            $order-> Products()->attach([
                $item->product_id => [
                    'name' => $item->Product->name,
                    'price'=> $item->Product->price,
                    'units'=> $item->units
                ]
                ]);
        }

        $cart->delete();
        return redirect(route('order.index'));
    }

}



