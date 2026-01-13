/*
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
*/
var responseWork = document.getElementById("response-work");
var workAlert = function (contentResponse, action) {
    if ( !contentResponse ) { contentResponse = 'Um ou mais campos possuem um erro. Verifique e tente novamente.'; }
    if ( !action ) { action = 'danger'; }
    var styleAction = 'wpcf7-validation-errors';
    switch (action) {
        case 'danger': styleAction = 'w-full bg-red-700 text-white my-2 p-3 uppercase text-center font-reading font-bold border-2 border-white  border-dashed'; break;
        case 'warning': styleAction = 'w-full bg-yellow-600 text-white my-2 p-3 uppercase text-center font-reading font-bold border-2 border-white  border-dashed'; break;
        case 'success': styleAction = 'w-full bg-green-700 text-white my-2 p-3 uppercase text-center font-reading font-bold border-2 border-white  border-dashed'; break;
    }
    responseWork.innerHTML='<div class="wpcf7-response-output ' + styleAction + '" role="alert">' + contentResponse + '</div>';
}
var alertReset = function () { responseWork.innerHTML=''; }


class FormWizard {
    constructor(prop_element = null, prop_currentStepIdx = 0) {
        this.element = prop_element
        this.steps = [...this.element.querySelectorAll('.js-step')]
        this.formControls = [...this.element.querySelectorAll('.js-form-control')]
        this.btnPrev = this.element.querySelector('.js-btn-prev')
        this.btnNext = this.element.querySelector('.js-btn-next')
        this.progressBar = this.element.querySelector('.js-progress-bar')
        this.currentStepIdx = prop_currentStepIdx
        this.init()
    }

    init() {
        this.showStep(this.currentStepIdx)
        this.addEvents()
    }

    resetStep() {
        this.currentStepIdx = 0;
        var currentStepReset = this.steps;
        for (let singleStepReset of currentStepReset) {
            singleStepReset.classList.remove('is-active');
        }
        this.prevNext(0);
    }
    eventSubmit() { 
        var sendPromotion = false;
        var formWork = document.getElementById("form-work");
        var uploadFile = document.getElementById("curriculo-contact");
        
    
        workAlert('Enviando...', 'warning');
        if (sendPromotion == false) {
            sendPromotion = true;
            
            
            const form = new FormData(formWork);
            if (uploadFile.files) {
                const files = uploadFile.files;
                form.append('curriculo', files[0])
            }

            const params = new URLSearchParams(form);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', ajax_object.location, true);

            xhr.onload = () => {
                if (xhr.status == 200) {
                    var responseDataCookie = JSON.parse(xhr.response);
                    console.log(responseDataCookie.content);
                    if (responseDataCookie.status == true) {
                        workAlert(responseDataCookie.content, 'success');
                        formWork.reset();
                        this.resetStep();
                        sendPromotion = false;
                    }
                    else { workAlert(responseDataCookie.content); sendPromotion = false; }
                } else {
                    workAlert('Houve algum erro, tente novamente mais tarde!'); sendPromotion = false;
                }
            };
            
            xhr.send(form);
        }
        else { workAlert('Aguarde, salvando seu cadastro...', 'warning'); }
        return false;
    }
    showStep(prop_stepIdx = 0) {
        const stepIdx = prop_stepIdx
        this.steps[stepIdx].classList.add('is-active')
        this.btnPrev.classList[stepIdx === 0 ? 'remove' : 'add']('is-active')
        this.btnNext.innerText = this.btnNext.dataset[stepIdx === this.steps.length - 1 ? 'finalStepText' : 'stepText']
        this.updateProgressBar(stepIdx)
    }

    prevNext(prop_value = 0) {
        const value = prop_value
        if (value === 1 && !this.validate()) {
            return false
        }
        if (value === 1 && this.currentStepIdx == 6) {
            this.eventSubmit();
            return false
        }
        else {
            this.steps[this.currentStepIdx].classList.remove('is-active')
            this.currentStepIdx += value
            this.showStep(this.currentStepIdx)
        }
    }

    validate() {
        const currentStepRequiredElements = [...this.steps[this.currentStepIdx].querySelectorAll('[required]')]
        let valid = true
        for (let element of currentStepRequiredElements) {
            if (element.value === null || element.value.trim() === '') {
                element.closest('input,select,textarea').classList.add('invalid:border-red-700')
                valid = false
            }
        }
        return valid
    }

    clearErrors(e) {
        e.target.closest('input,select,textarea').classList.remove('invalid:border-red-700')
    }

    updateProgressBar(prop_stepIdx = 0) {
        
        var stepIcon = document.querySelectorAll('.step-icon');
        var stepProgress = document.querySelectorAll('.step-progress');
        var countStep = 0;
        for (let singleStepIcon of stepIcon ) {
            if (prop_stepIdx >= countStep) { singleStepIcon.classList.remove('bg-white', 'border-2', 'border-gray-200', 'text-gray-600'); singleStepIcon.classList.add('bg-red-700', 'text-white'); }
            else { singleStepIcon.classList.remove('bg-red-700', 'text-white'); singleStepIcon.classList.add('bg-white', 'border-2', 'border-gray-200', 'text-gray-600'); }
            countStep++;
        }
        var countStep = 0;
        for (let singleStepProgress of stepProgress ) {
            if (prop_stepIdx > countStep) { singleStepProgress.classList.remove('w-0'); singleStepProgress.classList.add('w-full'); }
            else { singleStepProgress.classList.remove('w-full'); singleStepProgress.classList.add('w-0'); }
            countStep++;
        }

        const percentage = prop_stepIdx / this.steps.length
        this.progressBar.style.transform = `scaleX(${percentage === 0 ? '0.01' : percentage})`
    }

    addEvents() {
        for (let formControl of this.formControls) {
            formControl.addEventListener('keyup', this.clearErrors.bind(this))
            formControl.addEventListener('change', this.clearErrors.bind(this))
        }
        this.btnPrev.addEventListener('click', this.prevNext.bind(this, -1))
        this.btnNext.addEventListener('click', this.prevNext.bind(this, 1))
    }
}

window.addEventListener('DOMContentLoaded', () => {
    window.formWizardObjs = {}
    const formWizards = [...document.querySelectorAll('.js-form-wizard')]
    if (formWizards.length) {
        for (let formWizard of formWizards) {
            formWizardObjs[formWizard.id] = new FormWizard(formWizard)
        }
    }
})

