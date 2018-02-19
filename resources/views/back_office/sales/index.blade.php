@extends('template.default_template')

@section('titre')
    Index commandes
@stop

@section('content')
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Ref</th>
                <th>Boisson</th>
                <th>Sucre(s)</th>
                <th>Prix</th>
                <th>User</th>
                <th>Date</th>
            </tr>
            </thead>
            @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->boisson->name }}</td>
                    <td>{{ $sale->sugar }}</td>
                    <td>{{ $sale->boisson->price }}</td>
                    @if(isset($sale->user->name))
                        <td>{{ $sale->user->name }}</td>
                    @else
                        <td>guest</td>
                    @endif
                    <td>{{ $sale->created_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection