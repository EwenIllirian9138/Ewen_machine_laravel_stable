@extends('template.back_office.default_template')

@section('titre')
    Gestion des stocks

@stop
@section ('content')
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Ingrédient</th>
        <th scope="col">Quantité</th>
    </tr>
    </thead>
    <tbody>
    @foreach($stock_ingre as $type => $resultat)
        <tr>
            <td>{{$id_ingredients++}}</td>
            <td>{{$type}}</td>
            <td>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <button type="button" class="btn btn-outline-danger">
                        -
                    </button>
                    <button type="button" class="btn btn-secondary">
                        {{$resultat}}
                    </button>
                    <button type="button" class="btn btn-outline-success">
                        +
                    </button>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfooter>
        <form>
            <td>
                <button type="submit" class="btn btn-outline-success">
                    add
                </button>
            </td>
            <td class="form-group">
                <input type="text" class="form-control" placeholder="Type">
            </td>
            <td class="form-group">
                <input type="text" class="form-control" placeholder="Number">
            </td>
        </form>
    </tfooter>
</table>
<<<<<<< HEAD
=======
@stop
>>>>>>> stock v4
