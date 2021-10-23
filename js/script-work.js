$(document).ready(function () {
    $('#field-nascimento').mask('00/00/0000');
    $('#field-cpf').mask('000.000.000-00', {reverse: true});
    $('#field-rg').mask('00.000.000-0', {reverse: true});
    $('#field-rg').mask('00.000.000-0', {reverse: true});

    var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
          field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

    $('#field-telefone').mask(SPMaskBehavior, spOptions);
    $('#field-celular').mask(SPMaskBehavior, spOptions);

    $('#delete-file-contact').click(function () {
        $('#curriculo-contact').val('');
    });
});

var responseWork = $("#response-work");
var promotionAlert = function (contentResponse, action) {
    if ( !contentResponse ) { contentResponse = 'Um ou mais campos possuem um erro. Verifique e tente novamente.'; }
    if ( !action ) { action = 'danger'; }
    var styleAction = 'wpcf7-validation-errors';
    switch (action) {
        case 'danger': styleAction = 'wpcf7-validation-errors'; break;
        case 'warning': styleAction = 'wpcf7-validation-alert'; break;
        case 'success': styleAction = 'wpcf7-mail-sent-ok'; break;
    }
    responseWork.html('<div class="wpcf7-response-output ' + styleAction + '" role="alert">' + contentResponse + '</div>');
    var position = responseWork.offset().top - 250;
    $('html, body').animate({ scrollTop: position }, 500);
}
var alertReset = function () {
    responseWork.delay(5000).queue(function(n) {
        $(this).html('');
        n();
    });
}

var sendPromotion = false;
var formWork = $("#form-work");
formWork.submit(function (event) {
    promotionAlert('Enviando...', 'warning');
    if (sendPromotion == false) {
        sendPromotion = true;
        event.preventDefault();
        var content = new FormData(formWork[0]);
        $.ajax({
            type: 'POST',
            url: ajax_object.location,
            data: content,
            processData: false,
            contentType: false
        }).done( function(actionPromotion) {
            try {
                actionPromotion = JSON.parse(actionPromotion);
                if (actionPromotion.status === true) {
                    promotionAlert(actionPromotion.content, 'success');
                    formWork.trigger('reset');
                    alertReset();
                } 
                else { promotionAlert(actionPromotion.content); }
            }
            catch (err) { promotionAlert('Houve algum erro, tente novamente mais tarde!'); }
            sendPromotion = false;
            
        });
    }
    else { promotionAlert('Aguarde, salvando seu cadastro...', 'warning'); }
    return false;
});