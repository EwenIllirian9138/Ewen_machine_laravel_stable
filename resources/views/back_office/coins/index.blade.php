@extends('template.default_template')
@include('template.navbar')
@section('titre')
    Gestion des Pièces
@stop

@section ('content')
    <table class="table">
        <thead>
        <tr>
            <th>Type</th>
            <th>Stock</th>
            <th>Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($coins as $coin)
            <tr>
                <td scope="col">{{ $coin->type }}€</td>
                <td scope="col">{{ $coin->stock }}</td>
                <td>
                    <a href="/coins/{{ $coin->id }}" class="fa fa-search-plus fa-lg" aria-hidden="true"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop