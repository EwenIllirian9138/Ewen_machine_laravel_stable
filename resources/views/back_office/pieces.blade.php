@extends('template.back_office.default_template')

@section('titre')
    Gestion des pieces
@endsection

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Type</th>
            <th scope="col">Nombre</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($coin_list as $type => $number)
            <tr>
                <td>{{$type/100}}€</td>
                <td>{{$number}}</td>
                <td>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <button type="button" class="btn btn-success">
                            +
                        </button>
                        <button type="button" class="btn btn-primary">
                            change
                        </button>
                        <button type="button" class="btn btn-danger">
                            -
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection