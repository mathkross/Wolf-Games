@extends('layouts.app')

@section('content')
<form action="{{route('produto.update', $produto->id)}}" method="POST" enctype="multipart/form-data">

    <div  class=" container pb-5 mt-5 form-row bg-light shadow p-3 mb-5 bg-light rounded-3 col-4">
        @csrf
        @method('PUT')
        <div class="form-row col-md"> <!-- Nome do personagem-->
            <label for="nomeProd">Nome Personagem</label>
            <input required type="text" class="form-control" id="nomeProd" name="name" value="{{$produto->name}}">
            <label for="precoProd">Preço</label>
            <input required type="number" class="form-control" step="0.1" id="preçoProd"  name="price" value="{{$produto->price}}">
        </div>

        <div class="form-row col-md"> <!-- estoque do personagem-->
            <label for="estokProd">Estoque</label>
            <input required type="number" class="form-control"  id="estokProd" name="stock" value="{{$produto->stock}}">
        </div>

        <div class="form-row col-md"> <!-- Categoria do personagem-->
            <label for="categProd">Categoria</label>
            <select required class="form-control " name="category_id" id="categProd">
                @foreach($categories as $category)
                <option value="{{$category->id}}"
                    {{ $produto->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-row col-md"> <!-- Descrição do personagem-->
            <label for="descrProd">Descrição</label>
            <textarea required class="form-control"  id="descrProd" name="description">  {{$produto->description}}</textarea>
        </div>

        <div class="form-row col-md"> <!-- Imagem do Personagem do personagem-->
            <label for="imgProd">Imagem do Produto</label>
            <input required type="file" class="form-control"  id="imgProd" name="image" value="{{$produto->stock}}">
        </div>
        <div   class="d-flex flex-column">
            <button  class="btn btn-warning mt-5 " type="submit">Enviar</button>
        </div>
    </div>


</form>

@endsection
