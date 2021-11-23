function validarForm(nameform){
    let req = new XMLHttpRequest();
    req.overrideMimeType("application/json");
    req.open('GET', "/datavalidator/"+nameform, true);
    req.onload  = function() {
       var jsonResponse = JSON.parse(req.responseText);
       // alert(JSON.stringify(jsonResponse))
       aplicarReglas(jsonResponse)
    };
    req.send(null);
}

function aplicarReglas(js)
{
    for (var key in js){
        procesarComponente(js[key])
    }
}

function procesarComponente(obj){
    id = obj['fieldname']
    var element = document.getElementById(id);
    if(element != null)
    {
        validadores(element, obj )
    }else{
        alert('No existe el campo: '+obj['fieldname'])
    }
}

function validadores(element, obj ){
    //--- coloca placeholder ---
    if(obj['val_placeholder']){
        element.placeholder=obj['val_placeholder']
    }

    if(obj['is_cuit'])
    {
        element.addEventListener('input', () => {
            element.setCustomValidity("");
            if(!isValidCUITCUIL(element.value))
                element.setCustomValidity(obj['is_cuit_error'])
        });
    }

    if(obj['is_email'])
    {
        element.addEventListener('input', () => {
            element.setCustomValidity("");
            if (!validator.isEmail(element.value))
                element.setCustomValidity(obj['is_email_error'])
        });
    }

    ///El campo extraproperties sirve para guardar parametros extra
    if(obj['is_emailrepeat'])
    {
        params = JSON.parse(obj['extraproperties'])
        var otroelement = document.getElementById(params['email']);
        if(otroelement != null)
        {
            element.addEventListener('input', () => {
                element.setCustomValidity("");
                if (element.value !== otroelement.value)
                  element.setCustomValidity(obj['is_emailrepeat_error'])
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
