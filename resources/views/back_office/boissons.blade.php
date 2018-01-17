@extends('template.back_office.default_template')

@section('titre')
    Gestion des boissons
@stop

@section('content')
	<table class="table">
		<thead>
        	<tr>
            	<th scope="col">BOISSONS DISPONIBLES </th>
            </tr>
        </thead>
		@foreach($boisson as $liste)
			<tr>
				<td>{{$liste}}</td> 
            </tr>
        @endforeach
        <td>
		<div class="btn-group btn-group-toggle" data-toggle="buttons">
            <button type="button" class="btn btn-info btn-block">
             add              
            </button>
            <button type="button" class="btn btn-block">
             edit
           	</button>
            <button type="button" class="btn btn-primary btn-block">
             remove
            </button>
        </div>
      	</td>
	</table>
@stop