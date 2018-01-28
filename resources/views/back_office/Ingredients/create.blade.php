@extends('template.back_office.default_template')

@section('titre')
    Ajouter un ingrédient
@stop

@section('content')
    <form method="post" action="/ingredients">
        {{ csrf_field() }}
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Stock</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>ID</td>
                <td><input type="text" class="form-control" name="name" placeholder="Name..."></td>
                <td><input type="number" class="form-control" name="stock" placeholder="Stock..."></td>
            </tr>
            </tbody>
        </table>
        <div class="btn-group">
            <button type="submit" class="btn btn-outline-success">Create</button>
            <a href="/ingredients" class="btn btn-outline-danger">Cancel</a>
        </div>
    </form>

@endsection