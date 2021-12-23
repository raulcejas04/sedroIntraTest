$(document).ready(function() {

	/*var list = $("[disabled='disabled']").each(function(i, li) {
        	var $campo = $(li);  
		console.log( $campo );
		$(li).hide();
	});*/
	
	$('#nueva_solicitud_cuit').on('change onfocusout', function () {
		console.log('parametro '+$(this).val());
		$.ajax({
			url: "{{path('get_persona_fisica_x_cuit')}}",
			type:"POST",
			data:{"cuit":$(this).val().replace('/-/g','')}, 
			async:true,
			success: function(data){
				console.log(data);
				//ret = eval('('+data+')');		
				//console.log('ret '+ret);	
				if(data != null && data.status=='Found'){
					$("#nueva_solicitud_razon_social").val(data.message); 
				}else{
					$("#nueva_solicitud_razon_social").val('Persona jurídica nueva'); 	
				}
			}
			})
	})
	$('#nueva_solicitud_cuil').on('change onfocusout', function () {
		console.log('parametro '+$(this).val());
		$.ajax({
			url: "{{path('get_persona_juridica_x_cuit')}}",
			type:"POST",
			data:{"cuit":$(this).val().replace('/-/g','')}, 
			async:true,
			success: function(data){
				console.log(data);
				//ret = eval('('+data+')');		
				//console.log('ret '+ret);	
				if(data != null && data.status=='Found'){
					$("#nueva_solicitud_denominacion").val(data.message); 
				}else{
					$("#nueva_solicitud_denominacion").val('Persona física nueva'); 	
				}
			}
			})
	})
})
