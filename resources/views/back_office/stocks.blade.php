@extends('template.back_office.default_template')

@section('titre')
    Gestion des stocks

@stop
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Type</th>
        <th scope="col">Nombre</th>
    </tr>
    </thead>
    <tbody>
    @foreach($coin_list as $type => $number)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$type/100}}€</td>
            <td>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <button type="button" class="btn btn-outline-danger">
                        -
                    </button>
                    <button type="button" class="btn btn-secondary">
                        {{$number}}
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
