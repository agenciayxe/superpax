// FORMULÁRIO DE CONTATO
var responseContact = document.getElementById("response-contact");
var promotionAlert = function (contentResponse, action) {
    if ( !contentResponse ) { contentResponse = 'Um ou mais campos possuem um erro. Verifique e tente novamente.'; }
    if ( !action ) { action = 'danger'; }
    var styleAction = 'wpcf7-validation-errors';
    switch (action) {
        case 'danger': styleAction = 'w-full bg-red-700 text-white my-2 p-3 uppercase text-center font-reading font-bold border-2 border-white  border-dashed'; break;
        case 'warning': styleAction = 'w-full bg-yellow-600 text-white my-2 p-3 uppercase text-center font-reading font-bold border-2 border-white  border-dashed'; break;
        case 'success': styleAction = 'w-full bg-green-700 text-white my-2 p-3 uppercase text-center font-reading font-bold border-2 border-white  border-dashed'; break;
    }
    responseContact.innerHTML='<div class="wpcf7-response-output ' + styleAction + '" role="alert">' + contentResponse + '</div>';
}
var alertReset = function () { responseContact.innerHTML=''; }
var sendPromotion = false;
var formContact = document.getElementById("form-contact");
if (formContact) {
    formContact.addEventListener('submit', function (event) {
        event.preventDefault();
        promotionAlert('Enviando...', 'warning');
        if (sendPromotion == false) {
            sendPromotion = true;
            const form = new FormData(formContact);
            const params = new URLSearchParams(form);
            fetch(ajax_object.location, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Cache-Control': 'no-cache',
                },
                body: params
            }).then(function (responseCookie) {
                responseCookie.json().then((responseDataCookie) => {
                    console.log(responseDataCookie.status);
                    if (responseDataCookie.status == true) {
                        document.getElementById('cookie-alert').remove();
                        promotionAlert(actionPromotion.content, 'success');
                        formContact.reset();
                        alertReset();
                        sendPromotion = false;
                    }
                    else { promotionAlert(responseDataCookie.content); sendPromotion = false; }
                });
            }).catch(function (responseError) { promotionAlert('Houve algum erro, tente novamente mais tarde!'); sendPromotion = false; });
        } 
        else { promotionAlert('Aguarde, salvando seu cadastro...', 'warning'); }
    });
}