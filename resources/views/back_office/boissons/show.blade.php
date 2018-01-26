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
        <a href="/boissons/{{ $boisson->id }}/destroy" class="btn btn-outline-danger">Delete</a>
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
            <th>ID</th>
            <th>ID/Ingredient</th>
            <th>Amount</th>
            <th>Details</th>
            <th>Delete</th>
        </tr>
        </thead>
        @if($boisson->ingredients->isNotEmpty())
            @foreach($boisson->recipes as $recipe)
                <tr>
                    <td>{{ $recipe->id }}</td>
                    <td>{{ $recipe->ingredient->id }}/{{$recipe->ingredient->name}}</td>
                    <td>{{ $recipe->amount }}</td>
                    <td>
                        <a href="/ingredients/{{ $recipe->ingredient->id }}" class="fa fa-search-plus fa-lg"
                           aria-hidden="true"></a>
                    </td>
                    <td>
                        <form action="/recipes/{{ $recipe->id }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-outline-danger">X</button>
                        </form>
                    </td>
                </tr>
            @endforeach
    </table>
    <div class="btn-group">
        <a href="/recipes/{{ $boisson->id }}/destroy" class="btn btn-outline-danger">Delete All</a>
        <a href="/recipes/{{ $boisson->id }}/edit" type="submit" class="btn btn-outline-success">Edit
            Recipe</a>
    </div>
    @else
    </table>
    <a href="/recipes/create/{{ $boisson->id }}" type="submit" class="btn btn-outline-success">Add</a>
    @endif
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