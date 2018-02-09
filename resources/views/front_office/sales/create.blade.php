@extends('template.default_template')

@section('titre')
    Préparation des boissons
@stop

@section('content')

    <div class="row ">
        <div class="col-sm-6 offset-3">
            <div class="card border-dark">

                <div class="card-header bg-dark text-white">
                    <h4>Commandez une boisson</h4>
                </div>

                <div class="card-body text-dark">
                    <form id="storeSale" action="/sales" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-transparent border-dark">Boissons</div>
                                </div>
                                <div class="input-group-prepend">
                                    <button id="btn-prev" form="noform" class="btn btn-dark"><<</button>
                                </div>
                                <select name="selectDrink" id="selectDrink"
                                        class="text-center custom-select custom-select-lg">
                                    @foreach($boissons as$boisson)
                                        <option value="{{ $boisson->id }}">{{ $boisson->name }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button id="btn-next" form="noform" class="btn btn-dark">>></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-transparent border-dark">Sucres</div>
                                </div>

                                <div class="input-group-prepend">
                                    <button id="sucre-prev" form="noform" class="btn btn-dark">-</button>
                                </div>
                                <select name="selectSucre" id="selectSucre" class="text-center custom-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                <div class="input-group-append">
                                    <button id="sucre-next" form="noform" class="btn btn-dark">+</button>
                                </div>
                            </div>
                        </div>
                        @guest
                        @else
                            <input name="user" type="hidden" value="{{ Auth::id() }}">
                        @endguest
                    </form>
                </div>

                <div class="card-footer bg-dark">
                    <button form="storeSale" class="btn btn-success">valider</button>
                </div>
            </div>
        </div>
    </div>


@endsection