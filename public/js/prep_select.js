function moneyCount() {
    let displayer = $('#displayMoney');
    let inputMoney = $('#totalMoney');
    let total = 0;
    for (let i = 0; i < $('.coins').length; i++) {
        let who = $('.coins:eq(' + i + ')');
        let what = Number((who.children('label').html().split('€'))[0]);
        let multiple = Number(who.children('input').val());
        let howMuch = what * multiple;
        total += howMuch;
        total = Number((total).toFixed(2));
    }
    displayer.html(total + '€');
    inputMoney.val(total * 100);
}

function displayDrink() {
    $('.boissons').html($('#selectDrink option:selected').html());
}

$(document).ready(function () {
    displayDrink();

    $('#btnValider img').click(function() {
       if ($('#chargement').width() == 0) {
    	$('#validerChoix').click();
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

    $('.coins input').val(0);
    $('#selectPrice').val($('#selectDrink option:selected').val());

    $('.coin-next').click(function () {
        let how = Number($(this).next().html()) + 1;
        $(this).next().html(how);
        $(this).siblings('input').val(how);
        moneyCount();
    });

    $('.coin-prev').click(function () {
        let how = Number($(this).siblings('.count').html()) - 1;
        if (how >= 0) {
            $(this).siblings('.count').html(how);
            $(this).siblings('input').val(how);
            moneyCount();
        }
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

}).on('click', function () {
    $('#selectPrice').val($('#selectDrink option:selected').val());
});