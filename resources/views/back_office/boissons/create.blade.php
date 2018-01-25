@extends('template.back_office.default_template')

@section('titre')
    Ajouter une boissons
@stop

@section('content')
    <form method="post" action="/boissons">
        {{ csrf_field() }}
        <table class="table">

            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>ID</td>
                <td><input type="text" class="form-control" name="name" placeholder="Name..."></td>
                <td><input type="number" class="form-control" name="price" placeholder="Price..."></td>
            </tr>
            </tbody>
        </table>
        <div class="btn-group">
            <button type="submit" class="btn btn-outline-success">Create</button>
            <a href="/boissons" class="btn btn-outline-danger">Cancel</a>
        </div>
    </form>

@endsection