let money = {
    200: 0,
    100: 0,
    50: 0,
    20: 0,
    10: 0,
    5: 0,
}

function moneyCount(alt) {
    let displayer = $('#monnaieUser');
    let total = Number(displayer.html().split('€')[0]);
    let howMuch = Number((alt / 100).toFixed(2));

    total += howMuch;
    total = total.toFixed(2);
    displayer.html(total + '€');
    jsonification();
}

function jsonification() {
    let json = JSON.stringify(money);
    $("input[name='money']").val(json);
}

function displayDrink() {
    let content = $('#selectDrink option:selected').html().split('/');
    $('.boissons').html(content[0]);
    $('.price').html(content[1]);
}

$(document).ready(function () {

    moneyCount(0);
    displayDrink();
    jsonification();

    $('#btnValider img').click(function () {
        if ($('#chargement').width() == 0) {
            $('#validerChoix').click();
        }
    });

    $('.coins').click(function () {

        let alt = $(this).attr('alt');
        money[alt]++;
        moneyCount(alt);

    }).hover(function () {
        $(this).css('box-shadow', '0 0 20px white');
    }, function () {
        $(this).css('box-shadow', '0 0 0 white');
    }).mousedown(function () {
        $(this).css('padding', '1px');
    }).mouseup(function () {
        $(this).css('padding', '0px');
    });

    $('#btnMoney img').click(function () {
        let etat = $(this).attr('src').split('.png').join('').split('/img/buttons/euro').join('');
        if (etat === 'Hover') {
            $(this).attr('src', $(this).attr('src').split('Hover').join('Push'));
        } else {
            $(this).attr('src', '/img/buttons/euroHover.png');
        }
        $('#moneyForm').toggleClass('hidden');
        $(this).parent().toggleClass('backgroundGrey');
    }).hover(function () {
        let etat = $(this).attr('src').split('.png').join('').split('/img/buttons/euro').join('');
        if (etat === 'Normal') {
            $(this).attr('src', $(this).attr('src').split('Normal').join('Hover'));
        }
    }, function () {
        $(this).attr('src', $(this).attr('src').split('Hover').join('Normal'));
    });

    $('html').click(function () {
        $('#moneyForm').addClass('hidden');
        $('#btnMoney').removeClass('backgroundGrey');
        $('#btnMoney img').attr('src', '/img/buttons/euroNormal.png');
    });

    $('.porteMonnaie').click(function (event) {
        event.stopPropagation();
    });

    $('#gobelet').click(function () {
        if ($('#chargement').width() == 768) {
            $('#gobelet').fadeOut('slow');
            $('#chargement').width('0px');
            $('.boissons').html('Veuillez selectionner une boisson');
            $('.ingredients').height('0');
            $('#Lait').css('margin-top', '198px');
            $('.ingredients').css('background-color', '').fadeTo(0, 1);
        }
    });

    $('.buttons').hover(function () {
        $(this).attr('src', $(this).attr('src').split('Normal').join('Hover'));
    }, function () {
        $(this).attr('src', $(this).attr('src').split('Hover').join('Normal'));
    }).mousedown(function () {
        $(this).attr('src', $(this).attr('src').split('Hover').join('Push'));
    }).mouseup(function () {
        $(this).attr('src', $(this).attr('src').split('Push').join('Hover'));
    });

    $('#btnDroite').click(function () {
        if ($('#selectDrink option:selected').next().length == 1) {
            $('#selectDrink option:selected').next().prop('selected', true);
            displayDrink();
        } else {
            $('#selectDrink option:first').prop('selected', true);
            displayDrink();
        }
    });

    $('#btnGauche').click(function () {
        if ($('#selectDrink option:selected').prev().length == 1) {
            $('#selectDrink option:selected').prev().prop('selected', true);
            displayDrink();
        } else {
            $('#selectDrink option:last').prop('selected', true);
            displayDrink();
        }
    });

    $('#sucre-next').click(function () {
        if ($('#selectSucre option:selected').next().length == 1) {
            $('#selectSucre option:selected').next().prop('selected', true);
        } else {
            $('#selectSucre option:first').prop('selected', true);
        }
    });

    $('#sucre-prev').click(function () {
        if ($('#selectSucre option:selected').prev().length == 1) {
            $('#selectSucre option:selected').prev().prop('selected', true);
        } else {
            $('#selectSucre option:last').prop('selected', true);
        }
    });

});