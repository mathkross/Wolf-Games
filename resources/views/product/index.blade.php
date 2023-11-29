@extends('layouts.app')

@section('content')

<div class="container mt-5 pb-5 ">

    <table class="table table-striped table-dark">
        <thead >
            <tr class="text-secondary text-lg " align="center">
                <th>ID</th>
                <th>Image</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Editar</th>
                <th>Apagar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td>{{$produto->id}}</td>
                <td><img src="{{asset($produto->image)}}" style="width:35px; height:35px;"></td>
                <td>{{$produto->name}}</td>
                <td>{{$produto->description}}</td>
                <td>{{$produto->Category->name}}</td>
                <td>{{$produto->Type->name}}</td>
                <td>{{$produto->price}}</td>
                <td>{{$produto->stock}}</td>
                <td><a  class="btn btn-warning" href="{{ route('produto.edit', $produto->id) }}">Editar</a></td>
                <td><a  class="btn btn-danger" href="{{ route('produto.destroy', $produto->id) }}">Apagar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
