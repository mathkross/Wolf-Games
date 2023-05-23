@extends('layouts.app')

@section('content')

<div class="container mt-5 pb-5">

    <table class="table table-striped table-dark ">
        <thead>
            <tr class="text-secondary text-lg " align="center">
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Cat ID</th>
                <th>Categoria</th>
                <th>Tag</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Restaurar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($demands as $demand)
            <tr>
                <td>{{$demand->id}}</td>
                <td>{{$demand->name}}</td>
                <td>{{$demand->description}}</td>
                <td>{{$demand->Category->id}}</td>
                <td>{{$demand->Category->name}}</td>
                <td>@foreach($demand->Tags()->get() as $tag)
                {{$tag->name}}
                @endforeach</td>
                <td>{{$demand->price}}</td>
                <td>{{$demand->stock}}</td>
                <td><a class="btn btn-success" href="{{ route('demand.restore', $demand->id) }}">Restaurar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
