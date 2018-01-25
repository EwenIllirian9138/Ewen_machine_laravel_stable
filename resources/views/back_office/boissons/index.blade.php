@extends('template.back_office.default_template')

@section('titre')
    Gestion des boissons
@stop

@section('content')
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Details</th>
            </tr>
            </thead>
            @foreach($boissons as $boisson )
                <tr>
                    <td>{{ $boisson->name }}</td>
                    <td>{{ $boisson->price }}</td>
                    <td>
                        <a href="/boissons/{{ $boisson->id }}" class="fa fa-search-plus fa-lg" aria-hidden="true"></a>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="/boissons/create" type="button" class="btn btn-outline-success">New</a>
    </div>
@endsection