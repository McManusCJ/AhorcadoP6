$("#btn-reg").click(function(event){
	$.ajax({
		url:"../programs/valida.php",
		data:{
			nombre:$("#nombre").val(),
			usuario:$("#usuario").val(),
			contra:$("#contra").val()
		},
		type:"POST",
		dataType:"text",
		success:function(data)
		{
			console.log(data);
			if(data!='pasa')	//en caso de error
			{
				//event.preventDefault();
				if(data=='existe')
				{
					console.log("Ese usuario ya existe");
					$("#usuario").addClass("has-error");
					$("#cuerpo-modal").append('<div class="alert alert-danger alert-dismissible" role="alert">Ese usario ya existe<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				}
				else if(data=='incompleto')
					console.log("Completa los datos");
				else if(data=="incorrecta")
					console.log("Contraseña incorrecta");
			}
			else
				console.log("Si se pudo");
		}
	});
});

$("#btn-ini").click(function(event){
	$.ajax({
		url:"../valida.php",
		data:{
			usuario-ini:$("#usuario-ini").val(),
			contra-ini:$("#contra-ini").val()
		},
		type:"POST",
		dataType:"text",
		success:function(data){
			if(data=='entraste')
				console.log("Has accesado");
			else
			{
				event.preventDefault();
				if(data=='incompleto')
					console.log("Completa los datos");
				else if(data=='nohay')
					console.log("Ese usuario no existe");
				else if(data=='contrasenia incorrecta')
					console.log("Contraseña incorrecta");
			}
		}
	});
});
