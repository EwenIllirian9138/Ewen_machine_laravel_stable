@extends('template.back_office.default_template')

@section('titre')
    Gestion des boissons
@stop

@section('content')
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
        	<tr>
            	<th>BOISSONS DISPONIBLES</th>
            </tr>
        </thead>
        @foreach($boisson as $liste)
            <tr>
                <td>{{$liste}}</td>
            </tr>
        @endforeach
    </table>
	<div class="btn-group-vertical" data-toggle="buttons">
        <button type="button" class="btn btn-info">
            add              
        </button>
        <button type="button" class="btn">
            edit
        </button>
        <button type="button" class="btn btn-primary">
            remove
        </button>
    </div>
</div>
@stop