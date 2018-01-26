@extends('template.back_office.default_template')

@section('titre')
    Editer la recette de {{ $boisson->name }}
@stop

@section('content')
    <form method="post" action="/recipes">
        {{ csrf_field() }}
        <table class="table">
            <thead>
            <tr>
                <th><a id="add_line" class="btn btn-outline-success">+</a></th>
                <th>Ingredient</th>
                <th>Quantity</th>
            </tr>
            </thead>
            <tbody>
            @foreach($boisson->ingredients as $recipe)
                <tr class="line">
                    <td>#</td>
                    <td>
                        <select name="ingredients[]" class="ingredients form-control" id="exampleFormControlSelect1">
                            @foreach($ingredients as $ingredient)
                                @if($ingredient->id == $recipe->pivot->ingredient_id)
                                    <option value="{{$ingredient->id}}" selected="selected">{{$ingredient->name}}HEHE</option>
                                @else
                                    <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="amount[]" value="{{$recipe->pivot->amount}}">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="btn-group">
            <button type="submit" class="btn btn-outline-success">Edit</button>
            <a href="/recipes" class="btn btn-outline-danger">Cancel</a>
        </div>
    </form>

@endsection