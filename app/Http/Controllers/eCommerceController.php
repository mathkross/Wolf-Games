<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Demand;
use App\Models\Category;
use App\Models\Tag;

class eCommerceController extends Controller
{
    public function index(Product $products){
        return view('welcome')->with('products', $products->Paginate(8));
    }

    public function index2(Demand $demands){
        return view('welcomeDemand')->with('demands', $demands->Paginate(8));
    }

    public function searchCategory(Category $category){
        return view('store.search')->with(['products' => $category->Products, 'title' => $category->name]);
    }
    public function searchCategoryD(Category $category){
        return view('store.searchAssinatura')->with(['demands' => $category->Demands, 'title' => $category->name]);
    }
    
    public function searchTag(Tag $tag){
        return view('store.search')->with(['products' => $tag->Products, 'title' => $tag->name]);
    }
    public function searchTagD(Tag $tag){
        return view('store.searchAssinatura')->with(['demands' => $tag->Demands, 'title' => $tag->name]);
    }

    public function searchProduct(Request $request){
        $search = $request->query('s');

        if($search){
            $products = Product::where('name','LIKE',"%{$search}%")->get();
            return view('store.search')->with(['products' => $products, 'title' => $search]);
        }else{
            session()->flash('error', 'Você precisa digitar o nome de algum produto.');
            return redirect()->back();
        }
    }

    public function searchDemand(Request $request){
        $search = $request->query('s');

        if($search){
            $demands = Demand::where('name','LIKE',"%{$search}%")->get();
            return view('store.searchAssinatura')->with(['demands' => $demands, 'title' => $search]);
        }else{
            session()->flash('error', 'Você precisa digitar o nome de alguma assinatura.');
            return redirect()->back();
        }
    }

    public function showProduct(Product $product){
        return view('store.product')->with('product',$product);
    }
    public function showDemand(Demand $demand){
        return view('store.demand')->with('demand',$demand);
    }

}


