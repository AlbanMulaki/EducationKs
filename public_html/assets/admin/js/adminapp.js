/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $("#passwordFieldProfile").click(function () {
        var passwordFieldProfileInput = $("#passwordFieldProfileInput");
//        var passwordFieldProfileInput = $("#passwordFieldProfileInput");
//        console.log(passwordFieldProfileInput.hasAttribute("disabled"));

        if (passwordFieldProfileInput.is(":disabled")) {
            passwordFieldProfileInput.removeAttr('disabled', '');
        } else {
            passwordFieldProfileInput.attr('disabled', '');
        }
    });
    $(".passwordFieldProfile").click(function () {
        var passwordFieldProfileInput = $(".passwordFieldProfileInput");
//        var passwordFieldProfileInput = $("#passwordFieldProfileInput");
//        console.log(passwordFieldProfileInput.hasAttribute("disabled"));

        if (passwordFieldProfileInput.is(":disabled")) {
            passwordFieldProfileInput.removeAttr('disabled', '');
        } else {
            passwordFieldProfileInput.attr('disabled', '');
        }
    });
});

