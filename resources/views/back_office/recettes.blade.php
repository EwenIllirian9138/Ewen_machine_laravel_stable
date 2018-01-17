@extends('template.back_office.default_template')

@section('titre')
    Gestion des recettes
@stop

@section ('contenu')
    <button type="button" class="btn btn-outline-success">Add</button>
    @foreach ($allrecipes as $drink => $ingredients)
        <table class="table">
            <thead>
            <tr>
                <th>{{$drink}}</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <tr>
                @foreach($ingredients as $key => $value)
                    <td>{{$key}} : {{$value}}</td>
                @endforeach
            </tr>
            <tr>
            </tr>
            </tbody>
        </table>
        <div class="btn-group">
            <button type="button" class="btn btn-outline-danger">Remove</button>
            <button type="button" class="btn btn-outline-warning">Modify</button>
        </div>
    @endforeach


@stop

