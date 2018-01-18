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
<<<<<<< HEAD
        <tr>
            <td>
                <div class="" data-toggle="buttons">
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
            </td>
        </tr>
    </table>
=======
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
>>>>>>> f4837e6ed4b0c26e84694ecd88aa7707c68bd1c5
@stop