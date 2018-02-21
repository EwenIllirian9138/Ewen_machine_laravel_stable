@extends('template.default_template')

@section('titre')
    Gestion des Pièces
@stop

@section ('content')
    <table class="table">
        <thead>
        <tr>
            <th>Type</th>
            <th>nombre</th>
        </tr>
        </thead>
        <tbody>
        @foreach($coins as $value => $nombre)
            <tr>
                <td scope="col">{{ $value }}</td>
                <td scope="col">{{ $nombre }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop