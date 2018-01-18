@extends('template.back_office.default_template')

@section('titre')
    Gestion des boissons
@stop

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">BOISSONS DISPONIBLES</th>
        </tr>
        </thead>
        @foreach($boisson as $liste)
            <tr>
                <td>{{$liste}}</td>
            </tr>
        @endforeach
        <tr>
            <td>
                <div class="" data-toggle="buttons">
                    <button type="button" class="btn btn-info">
                        add
                    </button>
                    <button type="button" class="btn">
                        edit
                    </button>
                    <button type="button" class="btn btn-primary">
                        remove
                    </button>
                </div>
            </td>
        </tr>
    </table>
@stop