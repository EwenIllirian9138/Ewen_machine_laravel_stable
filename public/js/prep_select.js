function moneyCount() {
    let displayer = $('#monnaieUser');
    let total = 0;

    for (let i = 0; i < $('.coins').length; i++) {

        let alt = $('.coins:eq(' + i + ')').attr('alt');

        let multiple = $("input[name='coin[" + alt + "]']").val();

        let howMuch = (alt * multiple)/100;

        total += howMuch;

        total = Number((total).toFixed(2));
    }
    displayer.html(total + '€');
}

function displayDrink() {
    let content = $('#selectDrink option:selected').html().split('/');
    $('.boissons').html(content[0]);
    $('.price').html(content[1]);
}

$(document).ready(function () {

    moneyCount();
    displayDrink();
    $('.coins input').val(0);

    $('#btnValider img').click(function () {
        if ($('#chargement').width() == 0) {
            $('#validerChoix').click();
        }
    });

    $('.coins').click(function () {
        let alt = $(this).attr('alt');
        let selector = $("input[name='coin[" + alt + "]']");
        let val = Number(selector.val()) + 1;
        console.log(val);
        selector.val(val);

        moneyCount();

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
    }).hide();

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