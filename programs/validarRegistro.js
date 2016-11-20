
$("#btn-reg").click(function(event){
	
	$("#nota-reg").removeClass("hidden");
	
	if( $("#nom-reg").val().length >= 1 && 
		$("#usu-reg").val().length >= 1 && 
		$("#con-reg").val().length >= 1 )
		
		$.ajax({
			url:"../programs/valida.php",
			data:{
				nombre:$("#nom-reg").val(),
				usuario:$("#usu-reg").val(),
				contra:$("#con-reg").val()
			},
			type:"POST",
			dataType:"text",
			success:function(data)
			{
				console.log(data);
				
				if(data == 'SUCCESS')	//en caso de error
				{
					$("#nota-reg").removeClass("alert-danger");
					$("#nota-reg").removeClass("alert-warning");
					$("#nota-reg").addClass("alert-success");
					$("#nota-reg").html("Registro exitoso. Inicia sesión");
				}
				else
				{
					//event.preventDefault();
					if(data == 'ERROR: Completar datos')
					{
						$("#nota-reg").removeClass("alert-warning");
						$("#nota-reg").addClass("alert-danger");
						$("#nota-reg").html("Completa todos los campos");
					}
					else if(data == 'ERROR: Usuario Existente')
					{
						$("#nota-reg").removeClass("alert-danger");
						$("#nota-reg").addClass("alert-warning");
						$("#nota-reg").html("Ese usuario ya está registrado");
					}
				}	
			}
		});
	else
	{
		$("#nota-reg").removeClass("alert-warning");
		$("#nota-reg").addClass("alert-danger");
		$("#nota-reg").html("Completa todos los campos");
	}
});

$("#btn-ini").click(function(event){
	
	$("#nota-ini").removeClass("hidden");
	
	if( $("#usu-ini").val().length >= 1 && 
		$("#con-ini").val().length >= 1 )
		
		$.ajax({
			url:"../programs/valida.php",
			data:{
				usuarioIni:$("#usu-ini").val(),
				contraIni:$("#con-ini").val()
			},
			type:"POST",
			dataType:"text",
			success:function(data){
				console.log(data);
				
				if(data == 'SUCCESS')
					//FORWARD A LA PAGINA PRINCIPAL
					$(location).attr('href',"../programs/Inicio.php");
				else
				{
					//event.preventDefault();	
					if(data == 'ERROR: Completar datos')
					{
						$("#nota-ini").removeClass("alert-warning");
						$("#nota-ini").addClass("alert-danger");
						$("#nota-ini").html("Completa todos los campos");
					}
					else if(data == 'ERROR: NO EXISTE')
					{
						$("#nota-ini").removeClass("alert-danger");
						$("#nota-ini").addClass("alert-warning");
						$("#nota-ini").html("Ese usuario no está registrado");
					}
					else if(data == 'ERROR: INCORRECTA')
					{
						$("#nota-ini").removeClass("alert-warning");
						$("#nota-ini").addClass("alert-danger");
						$("#nota-ini").html("Contraseña incorrecta");
					}
				}
			}
		});
	else
	{
		$("#nota-ini").removeClass("alert-warning");
		$("#nota-ini").addClass("alert-danger");
		$("#nota-ini").html("Completa todos los campos");
	}
});
