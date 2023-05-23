@extends('layouts.app')

@section('content')
<form action="{{route('demand.update', $demand->id)}}" method="POST" enctype="multipart/form-data">

    <div  class=" container pb-5 mt-5 form-row bg-light shadow p-3 mb-5 bg-light rounded-3 col-4">
        @csrf
        @method('PUT')
        <div class="form-row col-md"> <!-- Nome da assinatura-->
            <label for="nomeDemand">Nome da assinatura</label>
            <input required type="text" class="form-control" id="nomeDemand" name="name" value="{{$demand->name}}">
            <label for="precoDemand">Preço</label>
            <input required type="number" class="form-control" step="0.1" id="precoDemand"  name="price" value="{{$demand->price}}">
        </div>

        <div class="form-row col-md"> <!-- estoque da assinatura-->
            <label for="estokDemand">Estoque</label>
            <input required type="number" class="form-control"  id="estokDemand" name="stock" value="{{$demand->stock}}">
        </div>

        <div class="form-row col-md"> <!-- Categoria da assinatura-->
            <label for="categDemand">Categoria</label>
            <select required class="form-control " name="category_id" id="categDemand">
                @foreach($categories as $category)
                <option value="{{$category->id}}"
                    {{ $demand->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row col-md"> <!-- Tagamento da assinatura-->
            <label for="tagDemand">Tag</label>
            <select class="form-control"  multiple name="tags[]" id="tagDemand">
                @foreach($tags as $tag)
                <option value="{{$tag->id}}"
                    {{ $demand->hasTag($tag->id) ? 'selected' : '' }}
                    >{{$tag->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-row col-md"> <!-- Descrição da assinatura-->
            <label for="descrDemand">Descrição</label>
            <textarea required class="form-control"  id="descrDemand" name="description">  {{$demand->description}}</textarea>
        </div>

        <div class="form-row col-md"> <!-- Imagem da assinatura-->
            <label for="imgDemand">Imagem da Assinatura</label>
            <input required type="file" class="form-control"  id="imgDemand" name="image" value="{{$demand->stock}}">
        </div>
        <div   class="d-flex flex-column">
            <button  class="btn btn-warning mt-5 " type="submit">Enviar</button>
        </div>
    </div>


</form>

@endsection
