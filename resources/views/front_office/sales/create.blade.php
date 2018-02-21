@extends('template.withoutNavbar')

@section('titre')
    Préparation des boissons
@stop

@section('content')

    <div id="machine">
        <form id="storeSale" action="/sales" method="post">
            {{ csrf_field() }}

            <select class="hidden" name="id" id="selectDrink">
                @foreach($boissons as$boisson)
                    <option value="{{ $boisson->id }}">{{ $boisson->name }}/{{ $boisson->price/100 . '€' }}</option>
                @endforeach
            </select>

            <input class="hidden" id="nbSucres" name="selectSucre" type="number" value="3">
            <input type="hidden" name="money">
            <button id="validerChoix" class="hidden" name="submit" type="submit"></button>
        </form>

        <div id="moneyForm" class="hidden porteMonnaie">
            <img class="coins porteMonnaie" src="{{ asset('img/pieces/2euro.png') }}" alt="200">
            <img class="coins porteMonnaie" src="{{ asset('img/pieces/1euro.png') }}" alt="100">
            <img class="coins porteMonnaie" src="{{ asset('img/pieces/50cent.png') }}" alt="50">
            <img class="coins porteMonnaie" src="{{ asset('img/pieces/20cent.png') }}" alt="20">
            <img class="coins porteMonnaie" src="{{ asset('img/pieces/10cent.png') }}" alt="10">
            <img class="coins porteMonnaie" src="{{ asset('img/pieces/5cent.png') }}" alt="5">
        </div>

        <div id="afficheur">

            <div id="gauche">
                <img id="btnGauche" class="buttons" src="{{ asset('img/buttons/gaucheNormal.png') }}" alt="Gauche">
            </div>

            <div id="affichageChoix" class="text-center">
                <div class="infos">
                    @if($errors->any())
                        @foreach( $errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    @else
                        En attente
                    @endif

                </div>
                <i class="fa fa-coffee"></i><br/>
                <div class="boissons"></div>
                <div class="price"></div>

            </div>

            <div id="droite">
                <img id="btnDroite" class="buttons" src="{{ asset('img/buttons/droiteNormal.png') }}" alt="Droite">
            </div>

            <div id="chargement"></div>

        </div>

        <div id="monnayeur">

            <div id="btnMoney" class="porteMonnaie">
                <img class="porteMonnaie" src="{{ asset('img/buttons/euroNormal.png') }}" alt="euro">
            </div>

            <div id="fente">
                <img src="{{ asset('img/monnayeur/fente.png') }}" alt="fente">
            </div>

            <div id="btnResetMonnaie">
                <img class="buttons" name="reset" src="{{ asset('img/buttons/resetNormal.png') }}" alt="reset">
            </div>

            <div id="retourMonnaie">
                <img src="{{ asset('img/monnayeur/retourMonnaie.png') }}" alt="monnaie">
            </div>

        </div>

        <div id="btnValider">

            <div id="afficheurMonnaie">
                <p class="monnaie" id="monnaieUser">
                    0€
                </p>
                <img id="validation" src="{{ asset('img/monnayeur/ecranMonnaie.png') }}" alt="monnaie">
            </div>

            <img class="buttons" src="{{ asset('img/buttons/validerNormal.png') }}" alt="valider">

        </div>

        <div id="zoneSucre">
            <div id="sucre-next">
                <img class="buttons" src="{{ asset('img/buttons/plusNormal.png') }}" alt="plus">
            </div>

            <div id="ledSucres">
                <img id="leds" src="{{ asset('img/led0sucres.png') }}" alt="ledSucre">
            </div>
            <div id="sucre-prev">
                <img class="buttons" src="{{ asset('img/buttons/moinsNormal.png') }}" alt="moins">
            </div>
        </div>

        <div id="zoneGob">

            <div id="gobelet" class="hidden">

                <div id="Lait" class="ingredients"></div>

                <div id="Eau" class="ingredients"></div>

                <div id="Thé" class="ingredients"></div>

                <div id="Chocolat" class="ingredients"></div>

                <div id="Café" class="ingredients"></div>

                <div id="Sucre" class="ingredients"></div>
            </div>
        </div>
    </div>
@endsection