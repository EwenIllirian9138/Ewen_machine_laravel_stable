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
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td scope="col">{{ $coin->type }}€</td>
            <td scope="col">{{ $coin->stock }}</td>
            <td>
                <button class="btn btn-outline-danger">X</button>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="btn-group">
        <a href="/coins/{{ $coin->id }}/edit" class="btn btn-outline-success">Edit</a>
        <a href="/coins" class="btn btn-outline-danger">Return</a>
    </div>
@stop