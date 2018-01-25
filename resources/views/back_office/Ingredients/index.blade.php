@extends('template.back_office.default_template')

@section('titre')
    Gestion des Ingrédients
@stop

@section ('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ingredients as $ingredient)
            <tr>
                <td>{{$ingredient->name}}</td>
                <td>{{$ingredient->amount}}</td>
                <td>
                    <a href="/ingredients/{{ $ingredient->id }}" class="fa fa-search-plus fa-lg" aria-hidden="true"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/ingredients/create" class="btn btn-outline-success">New</a>
@stop

