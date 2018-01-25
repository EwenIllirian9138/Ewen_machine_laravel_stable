@extends('template.back_office.default_template')

@section('titre')
    Gestion de {{ $ingredient->name }}
@stop

@section('content')
    <form action="/ingredients/{{ $ingredient->id }}" method="POST" >
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tr>
                <td>{{ $ingredient->id }}</td>
                <td><input type="text" class="form-control" name="name" value="{{ $ingredient->name }}"></td>
                <td><input type="number" class="form-control" name="amount" value="{{ $ingredient->amount }}"></td>
            </tr>
        </table>
        <div class="btn-group">
            <a href="/ingredients/{{ $ingredient->id }}/destroy" class="btn btn-outline-warning">Delete</a>
            <button type="submit" class="btn btn-outline-success">Update</button>
            <a href="/ingredients/{{ $ingredient->id }}" class="btn btn-outline-danger">Cancel</a>
        </div>
    </form>

@endsection