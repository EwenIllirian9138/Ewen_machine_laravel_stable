@extends('template.default_template')

@section('titre')
    Préparation des boissons
@stop

@section('content')

    <div id="machine">

        <form id="storeSale" action="/sales" method="post">
            {{ csrf_field() }}
            <select class="hidden" name="id" id="selectDrink">
                @foreach($boissons as$boisson)
                    <option value="{{ $boisson->id }}">{{ $boisson->name }}</option>
                @endforeach
            </select>

            <input id="sucresNb" class="hidden" name="sucres" type="radio" value="" checked="checked">
            <input id="200" class="hidden coinForm" name="200" type="radio" value="0" checked="checked">
            <input id="100" class="hidden coinForm" name="100" type="radio" value="0" checked="checked">
            <input id="50" class="hidden coinForm" name="50" type="radio" value="0" checked="checked">
            <input id="20" class="hidden coinForm" name="20" type="radio" value="0" checked="checked">
            <input id="10" class="hidden coinForm" name="10" type="radio" value="0" checked="checked">
            <input id="5" class="hidden coinForm" name="5" type="radio" value="0" checked="checked">

            <button id="validerChoix" class="hidden" name="submit" type="submit"></button>
        </form>

        <div id="moneyForm" class="hidden porteMonnaie">
            <img class="coins porteMonnaie" src="{{ asset('img/pieces/2euro.png') }}" alt="0">
            <img class="coins porteMonnaie" src="{{ asset('img/pieces/1euro.png') }}" alt="1">
            <img class="coins porteMonnaie" src="{{ asset('img/pieces/50cent.png') }}" alt="2">
            <img class="coins porteMonnaie" src="{{ asset('img/pieces/20cent.png') }}" alt="3">
            <img class="coins porteMonnaie" src="{{ asset('img/pieces/10cent.png') }}" alt="4">
            <img class="coins porteMonnaie" src="{{ asset('img/pieces/5cent.png') }}" alt="5">
        </div>

        <div id="afficheur">

            <div id="gauche">
                <img id="btnGauche" class="buttons" src="{{ asset('img/buttons/gaucheNormal.png') }}" alt="Gauche">
            </div>

            <div id="affichageChoix" class="text-center">
                <div>
                    <?php
                    if (isset($choix)) {
                        echo $prepare;
                        echo "<br/>" . date('d/m/Y H:i:s');
                    } else {
                        echo "En attente<br/>" . date('d/m/Y H:i:s');
                    } ;
                    ?>
                </div>

                <div class="boissons"></div>


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
                <form action="vueClient.php" method="post">
                    <input class="buttons" type="image" name="reset" src="{{ asset('img/buttons/resetNormal.png') }}"
                           alt="reset" value="true">
                </form>
                {{--<img class="buttons" src="{{ asset('img/buttons/resetNormal.png') }}" alt="reset">--}}

            </div>

            <div id="retourMonnaie">
                <img src="{{ asset('img/monnayeur/retourMonnaie.png') }}" alt="monnaie">
            </div>

        </div>

        <div id="btnValider">

            <div id="afficheurMonnaie">
                <p class="monnaie" id="monnaieUser">
                    <?php
                    //                    echo $monnaie / 100 + " €";
                    ?>
                </p>
                <img id="validation" src="{{ asset('img/monnayeur/ecranMonnaie.png') }}" alt="monnaie">
            </div>

            <img class="buttons" src="{{ asset('img/buttons/validerNormal.png') }}" alt="valider">

        </div>

        <div id="zoneSucre">
            <div id="btnPlus">
                <img class="buttons" src="{{ asset('img/buttons/plusNormal.png') }}" alt="plus">
            </div>

            <div id="ledSucres">
                <img id="leds" src="{{ asset('img/led5sucres.png') }}" alt="ledSucre">
            </div>
            <div id="btnMoins">
                <img class="buttons" src="{{ asset('img/buttons/moinsNormal.png') }}" alt="moins">
            </div>
        </div>

        <div id="zoneGob">

            <div id="gobelet">

                <div id="Lait" class="ingredients"></div>

                <div id="Eau" class="ingredients"></div>

                <div id="Thé" class="ingredients"></div>

                <div id="Chocolat" class="ingredients"></div>

                <div id="Café" class="ingredients"></div>

                <div id="Sucre" class="ingredients"></div>
            </div>
        </div>

        <div class="maintenance">
            <a href="vueMaintenance.php">
                <img class="buttons" src="{{ asset('img/buttons/adminNormal.png') }}">
            </a>
        </div>

    </div>
@endsection