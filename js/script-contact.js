var responseContact = $("#response-contact");
var promotionAlert = function (contentResponse, action) {
    if ( !contentResponse ) { contentResponse = 'Um ou mais campos possuem um erro. Verifique e tente novamente.'; }
    if ( !action ) { action = 'danger'; }
    var styleAction = 'wpcf7-validation-errors';
    switch (action) {
        case 'danger': styleAction = 'wpcf7-validation-errors'; break;
        case 'warning': styleAction = 'wpcf7-validation-alert'; break;
        case 'success': styleAction = 'wpcf7-mail-sent-ok'; break;
    }
    responseContact.html('<div class="wpcf7-response-output ' + styleAction + '" role="alert">' + contentResponse + '</div>');
    var position = responseContact.offset().top - 250;
    $('html, body').animate({ scrollTop: position }, 500);
}
var alertReset = function () {
    responseContact.delay(5000).queue(function(n) {
        $(this).html('');
        n();
    });
}

var sendPromotion = false;
var formContact = $("#form-contact");
formContact.submit(function (event) {
    promotionAlert('Enviando...', 'warning');
    if (sendPromotion == false) {
        sendPromotion = true;
        event.preventDefault();
        var content = new FormData(formContact[0]);
        $.ajax({
            type: 'POST',
            url: ajax_object.location,
            data: content,
            processData: false,
            contentType: false
        }).done( function (actionPromotion) {
            try {
                actionPromotion = JSON.parse(actionPromotion);
                if (actionPromotion.status === true) {
                    promotionAlert(actionPromotion.content, 'success');
                    formContact.trigger('reset');
                    alertReset();
                } 
                else { promotionAlert(actionPromotion.content); }
            }
            catch (err) { promotionAlert('Houve algum erro, tente novamente mais tarde!'); }
            sendPromotion = false;
        });
    }
    else {
        promotionAlert('Aguarde, salvando seu cadastro...', 'warning');
    }
    return false;
});