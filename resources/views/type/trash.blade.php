@extends('layouts.app')

@section('content')
<div class="container mt-5 pb-5">
    <table class="table table-striped table-dark">
        <thead>
            <tr class="text-secondary">
                <th>ID</th>
                <th>Nome do tipo</th>
                <th>Quantidade de Produtos no tipo</th>
                <th>Restaurar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
            <tr>
                <td>{{$type->id}}</td>
                <td>{{$type->name}}</td>
                <td>{{$type->Products->count() }}
                <td><a class="btn btn-success" href="{{ route('type.restore', $type->id) }}">Restaurar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
