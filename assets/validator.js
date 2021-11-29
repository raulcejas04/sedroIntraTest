/*const input_CUIT = document.getElementById('nueva_solicitud_cuit');
const input_CUIL = document.getElementById('nueva_solicitud_cuil');
const input_email = document.getElementById('nueva_solicitud_mail_first');
const input_email_repeat = document.getElementById('nueva_solicitud_mail_second');

input_CUIT.addEventListener('input', () => {
    input_CUIT.setCustomValidity("");
    if(!isValidCUITCUIL(input_CUIT.value))
        input_CUIT.setCustomValidity("Invalid CUIT!")
});

input_CUIL.addEventListener('input', () => {
    input_CUIL.setCustomValidity("");
    if (!isValidCUITCUIL(input_CUIL.value))
        input_CUIL.setCustomValidity("Invalid CUIL!")
});

input_email.addEventListener('input', () => {
    input_email.setCustomValidity("");
    if (!validator.isEmail(input_email.value))
        input_email.setCustomValidity("Invalid E-MAIL!")
});

input_email_repeat.addEventListener('input', () => {
    input_email_repeat.setCustomValidity("");
    if (input_email.value !== input_email_repeat.value)
        input_email_repeat.setCustomValidity("E-MAIL doesn't match!")
});*/


$(document).ready(function() {
$('input[type=text]').each(
    function(index){  
        var input = $(this);
        //alert('Type: ' + input.attr('type') + ' | Name: ' + input.attr('name') + ' | Value: ' + input.val());
	        var myClass = $(this).attr("class");
        
	        //es del tipo CUIT
	        if( myClass.indexOf("val-cuit") >= 0 )
	        {

	               input.bind("change blur",(event)=>{  

			    input[0].setCustomValidity("");
			    if (!isValidCUITCUIL(input.val()))
			    {
			        input[0].setCustomValidity("Invalid CUIL!");
				console.log(input.attr('id'));
      			        input.val('');
      			        input.focus();
      			        document.getElementById(input.attr('id')).focus();
      			        event.preventDefault();
      			        return false;
			    }
		      });
	        
	        
			input.bind('input', () => {
			    input[0].setCustomValidity("");
			    if (!isValidCUITCUIL(input.val()))
			    {
			        input[0].setCustomValidity("Invalid CUIL!")
			        return false;
			    }
			});
	        }
    }
);
})

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
