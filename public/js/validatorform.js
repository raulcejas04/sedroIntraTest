function validarForm(nameform){
    let req = new XMLHttpRequest();
    req.overrideMimeType("application/json");
    req.open('GET', "/datavalidator/"+nameform, true);
    req.onload  = function() {
       let jsonResponse = JSON.parse(req.responseText);
       // alert(JSON.stringify(jsonResponse))
       aplicarReglas(jsonResponse)
    };
    req.send(null);
}

function aplicarReglas(js)
{
    for (let key in js){
        procesarComponente(js[key])
    }
}

function procesarComponente(obj){
    let id = obj['fieldname'];
    let id_err = obj['fieldname_err'];
    let element = document.getElementById(id);
    let element_err = document.getElementById(id_err);
    if(element != null)
    {
        validadores(element, obj, element_err)
    }else{
        alert('No existe el campo: '+obj['fieldname'])
    }
}

function validadores(element, obj, element_err){
    //--- coloca placeholder ---
    if(obj['val_placeholder']){
        element.placeholder=obj['val_placeholder']
    }

    if(obj['is_cuit'])
    {
        element.addEventListener('keydown', event => {
            if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') return
            element.selectionStart = element.textLength;
            element.selectionEnd = element.textLength;
            element.value = element.value[1] && element.value[2]!=='-' ? element.value.slice(0,2) + '-' + element.value.slice(2) : element.value;
            element.value = element.value[10] && element.value[11]!=='-' ? element.value.slice(0,11) + '-' + element.value.slice(11) : element.value;
            if (event.key === 'Backspace' && element.selectionStart === 3 && element.selectionEnd === 3 && element.textLength === 3) {
                event.preventDefault();
                element.value = element.value.slice(0, -2);
                return
            }
            if (event.key === 'Backspace' && element.selectionStart === 12 && element.selectionEnd === 12 && element.textLength === 12) {
                event.preventDefault();
                element.value = element.value.slice(0, -2);
            }
        });

        element.addEventListener('keypress', event => {
            if (!validator.isNumeric(event.key) || element.textLength >= 13) event.preventDefault()
        });

        input.addEventListener('focusout', event => {
            input.setCustomValidity("");
            if(!isValidCUITCUIL(element.value)) {
                input.setCustomValidity("Cuit/Cuil inválido");
                ("#err_"+input).innerHTML = "Cuit/Cuil inválido";
                ("#err_"+input).style.color = 'red'; // TODO es provisorio, habría que sacarlo y hacerlo desde CSS
            } else {
                ("#err_"+input).innerHTML = '';
            }
        });
    }

    if(obj['is_email'])
    {
        element.addEventListener('focusout', () => {
            element.setCustomValidity("");
            if (!validator.isEmail(element.value)) {
                element.setCustomValidity(obj['is_email_error']);
                element_err.innerHTML = obj['is_email_error'];
                element_err.style.color = 'red'; // TODO es provisorio, habría que sacarlo y hacerlo desde CSS
            } else {
                element_err.innerHTML = '';
            }
        });
    }

    ///El campo extraproperties sirve para guardar parametros extra
    if(obj['is_emailrepeat'])
    {
        params = JSON.parse(obj['extraproperties'])
        let otroelement = document.getElementById(params['email']);
        if(otroelement != null)
        {
            element.addEventListener('focusout', () => {
                element.setCustomValidity("");
                if (element.value !== otroelement.value) {
                    element.setCustomValidity(obj['is_emailrepeat_error']);
                    element_err.innerHTML = obj['is_emailrepeat_error'];
                    element_err.style.color = 'red'; // TODO es provisorio, habría que sacarlo y hacerlo desde CSS
                } else {
                    element_err.innerHTML = '';
                }
            });
        }else{
            alert("Validacion: No existe campo emailrepeat:"+params['email']+" en extraproperties\n- Posiblemente debera anteponer el nombre del formulario: nombreform_"+params['email']+"\n- Verifique ademas el nombre")
        }
    }

    ///--------
    // SEGUIR PROGRAMNDO EL RESTO DE LAS VALIDACIONES
}


function isValidCUITCUIL(cuit) {
    if (cuit.length !== 13)
        return false;
    let rv = false;
    let resultado = 0;
    let cuit_nro = cuit.replace("-", "");
    let codes = "6789456789";
    let verificador = parseInt(cuit_nro[cuit_nro.length - 1]);
    let x = 0;
    while (x < 10) {
        let digitoValidador = parseInt(codes.substring(x, x + 1));
        if (isNaN(digitoValidador))
            digitoValidador = 0;
        let digito = parseInt(cuit_nro.substring(x, x + 1));
        if (isNaN(digito))
            digito = 0;
        let digitoValidacion = digitoValidador * digito;
        resultado += digitoValidacion;
        x++;
    }
    resultado = resultado % 11;
    rv = (resultado === verificador);
    return rv;
}



//alert(JSON.stringify(obj[valx]))
