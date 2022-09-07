"use strict";

$(".pwstrength").pwstrength();

$('#agree').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {

        $('#btn-register').removeAttr('disabled'); //enable input

    } else {
        $('#btn-register').attr('disabled', true); //disable input
    }
});