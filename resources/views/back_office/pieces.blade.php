@extends('template.back_office.default_template')

@section('titre')
    Gestion des pieces
@endsection

@section('content')
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
                    <form class="btn-group">
                        <button type="submit" class="btn btn-outline-danger">
                            -
                        </button>
                        <div class="btn btn-secondary">
                            {{$number}}
                        </div>
                        <button type="submit" class="btn btn-outline-success">
                            +
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfooter>
            <tr>
                <form>
                    <td>
                        <button type="submit" class="btn btn-outline-success">
                            add
                        </button>
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="Type">
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="Number">
                    </td>
                </form>
            </tr>
        </tfooter>
    </table>
@endsection