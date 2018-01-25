@extends('template.back_office.default_template')

@section('titre')
    Details de {{ $boisson->name }}
@stop

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
        </thead>
        <tr>
            <td>{{ $boisson->id }}</td>
            <td>{{ $boisson->name }}</td>
            <td>{{ $boisson->price }}</td>
            <td>{{ $boisson->created_at }}</td>
            <td>{{ $boisson->updated_at }}</td>
        </tr>
    </table>
    <div class="btn-group">
        <a href="/boissons/{{ $boisson->id }}/destroy" class="btn btn-outline-warning">Delete</a>
        <a href="/boissons/{{ $boisson->id }}/edit" type="submit" class="btn btn-outline-success">Edit</a>
        <a href="/boissons" class="btn btn-outline-danger">Return</a>
    </div>
    </br>
    </br>
    <h2>Recipe</h2>
    </br>
    <table class="table">
        <thead>
        <tr>
            <th>Ingredient</th>
            <th>Amount</th>
        </tr>
        </thead>
        @foreach($boisson->ingredients as $ingredient)
            <tr>
                <td>{{ $ingredient->name }}</td>
                <td>{{ $ingredient->pivot->amount }}</td>
            </tr>
        @endforeach
    </table>
    </br>
    </br>
    <h2>Sales</h2>
    </br>
    <table class="table">
        <thead>
        <tr>
            <th>Ref</th>
            <th>Purchased at</th>
        </tr>
        </thead>
        @foreach($boisson->sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->created_at }}</td>
            </tr>
        @endforeach
    </table>

@endsection