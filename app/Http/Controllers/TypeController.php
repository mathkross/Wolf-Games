<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(){
        return view('type.index')->with('types',Type::all());
    }

    public function create(){
        return view('type.create');
    }

    public function store(Request $request){
        Type::create($request->all());
        session()->flash('success','Tipo Criado com Sucesso!');
        return redirect(route('type.index'));
    }

    public function destroy(Type $type){
        $type->delete();
        session()->flash('success','Tipo apagado com Sucesso!');
        return redirect(route('type.index'));
    }

    public function edit(Type $type){
        return view('type.edit')->with('type', $type);
    }

    public function update(Type $type, Request $request){
        $type->update($request->all());
        session()->flash('success','Tipo Editada com Sucesso!');
        return redirect(route('type.index'));
    }

    public function trash(){
        return view('type.trash')->with('types',Type::onlyTrashed()->get());
    }

    public function restore($type_id){
        $type = Type::onlyTrashed()->where('id', $type_id)->first();
        $type->restore();
        session()->flash('success','Tipo restaurada com Sucesso!');
        return redirect(route('type.index'));
    }
}


