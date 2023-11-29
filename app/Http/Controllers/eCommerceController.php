<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Category;


class eCommerceController extends Controller
{
    public function index(Produto $products){
        return view('welcome')->with('products', $products->Paginate(8));
    }

    public function searchCategory(Category $category){
        return view('store.search')->with(['products' => $category->Products, 'title' => $category->name]);
    }


    public function searchProduct(Request $request){
        $search = $request->query('s');

        if($search){
            $products = Produto::where('name','LIKE',"%{$search}%")->get();
            return view('store.search')->with(['products' => $products, 'title' => $search]);
        }else{
            session()->flash('error', 'Você precisa digitar o nome de algum produto.');
            return redirect()->back();
        }
    }

    public function showProduct(Produto $product){
        return view('store.product')->with('product',$product);
    }


}


