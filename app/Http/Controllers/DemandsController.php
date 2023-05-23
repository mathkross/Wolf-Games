<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demand;
use App\Models\Category;
use App\Models\Tag;

class DemandsController extends Controller
{
    public function index(){
         return view('demand.index')->with('demands',Demand::all());
     }
 
     public function create(){
         return view('demand.create')->with([
             'categories' => Category::all(),
             'tags' => Tag::all()]);
     }
 
     public function store(Request $request){
         $image = "/storage/".$request->file('image')->store('itens');
 
         $demand = Demand::create([
             'name' => $request->name,
             'description' => $request->description,
             'price' => $request->price,
             'stock' => $request->stock,
             'category_id' => $request->category_id,
             'image' => $image
         ]);
 
         $demand->Tags()->sync($request->tags);
 
         session()->flash('success','Assinatura Criada com Sucesso!');
         return redirect(route('demand.index'));
     }
 
     public function destroy(Demand $demand){
         $demand->delete();
         session()->flash('success','Assinatura Apagada com Sucesso!');
         return redirect(route('demand.index'));
     }
 
     public function edit(Demand $demand){
         return view('demand.edit')->with([
             'demand' => $demand,
             'categories' => Category::all(),
             'tags' => Tag::all()]);
     }
 
     public function update(Demand $demand, Request $request){
         if($request->image){
             $image = "storage/".$request->file('image')->store('itens');
             $demand->update([
                 'name' => $request->name,
                 'description' => $request->description,
                 'price' => $request->price,
                 'stock' => $request->stock,
                 'category_id' => $request->category_id,
                 'image' => $image
             ]);
         }
         else
             $demand->update([
                 'name' => $request->name,
                 'description' => $request->description,
                 'price' => $request->price,
                 'stock' => $request->stock,
                 'category_id' => $request->category_id,
             ]);
 
         $demand->Tags()->sync($request->tags);
         session()->flash('success','Assinatura Editada com Sucesso!');
         return redirect(route('demand.index'));
     }
 
     public function trash(){
         return view('demand.trash')->with('demands',Demand::onlyTrashed()->get());
     }
 
     public function restore($demand_id){
         $demand = Demand::onlyTrashed()->where('id', $demand_id)->first();
         $demand->restore();
         session()->flash('success','Assinatura restaurada com Sucesso!');
         return redirect(route('demand.index'));
     }
}
