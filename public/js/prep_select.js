$(document).ready(function () {

    $('#btn-next').click(function () {
        if ( $('#selectDrink option:selected').next().length == 1) {
            $('#selectDrink option:selected').next().prop('selected', true);
        } else {
            $('#selectDrink option:first').prop('selected', true);
        }
    });

    $('#btn-prev').click(function () {
        if ( $('#selectDrink option:selected').prev().length == 1) {
            $('#selectDrink option:selected').prev().prop('selected', true);
        } else {
            $('#selectDrink option:last').prop('selected', true);
        }
    });

    $('#sucre-next').click(function () {
        if ( $('#selectSucre option:selected').next().length == 1) {
            $('#selectSucre option:selected').next().prop('selected', true);
        } else {
            $('#selectSucre option:first').prop('selected', true);
        }
    });

    $('#sucre-prev').click(function () {
        if ( $('#selectSucre option:selected').prev().length == 1) {
            $('#selectSucre option:selected').prev().prop('selected', true);
        } else {
            $('#selectSucre option:last').prop('selected', true);
        }
    });

});