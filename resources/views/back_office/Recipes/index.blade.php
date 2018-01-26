@extends('template.back_office.default_template')

@section('titre')
    Gestion des Recettes
@stop

@section ('content')
    @foreach($boissons as $boisson)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">{{$boisson->name}}
                    <a href="/boissons/{{ $boisson->id }}" class="fa fa-search-plus fa-lg" aria-hidden="true"></a></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <table class="table table-sm">
                        <thead>
                        @foreach($boisson->recipes as $recipe)
                            <th>{{$recipe->ingredient->name}}</th>
                        @endforeach
                        </thead>
                        <tbody>
                        @foreach($boisson->recipes as $recipe)
                            <td>{{$recipe->amount}}</td>
                        @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    @endforeach
    <a href="/recipes/create" type="button" class="btn btn-outline-success">New</a>
@stop

