function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    var i = 0;
	while (i <ca.length) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
		i++;
    }
    return "";
}
function hacerTabla(cadArr)
{
	var tabla = "<table><tr>";
	
	var arr = cadArr.split(".");
	for(var i=0; i<arr.length(); i++)
		tabla = tabla+"<td>"+arr[i]+"</td>";
	tabla = tabla+"</tr></table>";
	
	return tabla;
}
$("#empezar").click(function(event){		//click en el boton de juego nuevo
	$.ajax({
		url:"../programs/juego.php",
		data:{ materia:$("#materia").val() },
		type:"POST",
		dataType:"text",
		success:function(data){
			var datos = data.split(",");		//data tiene concatenados la pregunta y la respuesta separadas por una coma
			//document.cookie = "pregunta="+datos[0]+";";
			document.cookie = "palabra="+datos[1]+";";
			//var cadArr = datos[1].split("").join(".");	Esto servira en algun punto
			var cadArr = "";
			for(var x=0;x<datos[1].length();x++)	//inicializa el arreglo-cadena llenandolo de espacios
				cadArr = cadArr+" .";
			document.cookie = "arreglo="+cadArr+";";
			
			document.cookie = "puntos=0;";
			
			var tabla = hacerTabla(cadArr);
			tabla = '<div class="row" id="tabla-div">'+tabla+'</div>';
			
			var inputLetra = '<div class="row"><input type="text" id="letraU" class="form-control" maxlength="1" size="1"/>';
			inputLetra = inputLetra+'<button type="submit" class="btn btn-default btn-md" id="btn-res">Probar</button></div>';
			
			$("#tablero").html('<div class="row"><h2>'+datos[0]+'</h2></div>'+tabla+inputLetra);
		}
	});
});

$("#btn-res").click(function(){		//evento cada que meta una letra
	var puntos = parseInt(getCookie("puntos"));
	
	if(puntos<=6)
	{
		var letra = $("#letraU").val();		//falta validar con regex
		var palabraArr = getCookie("palabra").split("");
		var arregloArr = getCookie("arreglo").split(".");
		
		if(arregloArr.length()==palabraArr.length())	//esto es solo para ver si funciona
			console.log("Miden lo mismo");
		
		var resultado = FALSE;
		for(var i=0; i<palabraArr.length(); i++)
			if(palabraArr[i] == letra)
			{
				arregloArr[i] = letra;
				resultado = TRUE;
			}
		if(!resultado)
		{
			puntos++;
			$("#ahorcado").attr("src","../resources/punt"+puntos.toString()+".png");
		}
		else if(puntos == 6)
		{
			var ganador = '<h2>Has ganado</h2><div class="col-md-2">La respuesta es '+getCookie("palabra")+'</div>';
			ganador = ganador+'<a href="../programs/Inicio.php" class="btn btn-default btn-lg">¿Quieres jugar de nuevo?</a>';
			$("#tablero").html(ganador);
			$("#ahorcado").attr("src","../resources/vivio.png");
		}
				
		arregloCad = arregloArr.join(".");
		
		document.cookie = "arreglo="+arregloCad+";";
		$("#tabla-div").html(hacerTabla(arregloCad));
	}
	else{
		$("#ahorcado").attr("src","../resources/murio.png");
		var perdedor = '<h2>Has perdido</h2><div class="col-md-2">La respuesta era '+getCookie("palabra")+'</div>';
		perdedor = perdedor+'<a href="../programs/Inicio.php" class="btn btn-default btn-lg">¿Quieres jugar de nuevo?</a>';
		$("#tablero").html(perdedor);
	}
	document.cookie = "puntos="+puntos.toString()+";";
});