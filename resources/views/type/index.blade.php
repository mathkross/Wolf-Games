@extends('layouts.app')

@section('content')

<div class="container mt-5 pb-5">
    <table class="table table-striped table-dark">
        <thead>
            <tr class="text-secondary text-lg ">
                <th>ID</th>
                <th>Nome do Tipo</th>
                <th>Quantidade de Produtos no Tipo</th>
                <th>Editar</th>
                <th>Apagar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
            <tr>
                <td>{{$type->id}}</td>
                <td>{{$type->name}}</td>
                <td>{{$type->Products->count() }}
                <td><a class="btn btn-warning" href="{{ route('type.edit', $type->id) }}">Editar</a></td>
                <td><a class="btn btn-danger" href="{{ route('type.destroy', $type->id) }}">Apagar</a></td>
            </tr>
            @endforeach
        <tbody>
    </table>
</div>
@endsection
