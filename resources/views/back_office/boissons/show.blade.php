@extends('template.back_office.default_template')

@section('titre')
    {{--<a href="/boissons" class="fa fa-angle-left fa-lg"></a>--}}
    Details de {{ $boisson->name }}
    {{--<a href="/boissons" class="fa fa-angle-right fa-lg"></a>--}}
@stop

@section('content')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tr>
            <td>{{ $boisson->id }}</td>
            <td>{{ $boisson->name }}</td>
            <td>{{ $boisson->price }}</td>
            <td>
                <form id='delete{{ $boisson->id }}' action="/boissons/{{ $boisson->id }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" form="delete{{ $boisson->id }}" class="btn btn-outline-danger">X</button>
                </form>
            </td>
        </tr>
    </table>
    <div class="btn-group">
        <a href="/boissons/{{ $boisson->id }}/edit" type="submit" class="btn btn-outline-success">Edit</a>
    </div>
    </br>
    </br>
    <h2>Recipe</h2>
    </br>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>ID/Ingredient</th>
            <th>Amount</th>
            <th>Details</th>
        </tr>
        </thead>
        @foreach($boisson->ingredients as $ingredient)
            <tr>
                <td>{{ $ingredient->pivot->id }}</td>
                <td>{{ $ingredient->id }}/{{$ingredient->name}}</td>
                <td>{{ $ingredient->pivot->quantity }}</td>
                <td>
                    <a href="/ingredients/{{ $ingredient->id }}" class="fa fa-search-plus fa-lg"
                       aria-hidden="true"></a>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="/recipes/{{ $boisson->id }}/edit" type="submit" class="btn btn-outline-success">Edit Recipe</a>
    </br>
    </br>
    <h2>Sales</h2>
    </br>
    <table class="table table-hover">
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