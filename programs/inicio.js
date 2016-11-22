function perdiste()
{
	var perdedor = '<h3>¡Has perdido!</h3><div class="col-md-2">La respuesta es '+getCookie("palabra")+'</div>';
	perdedor = perdedor+'<a href="../programs/Inicio.php" class="btn btn-warning btn-lg">¿Quieres jugar de nuevo?</a>';
	$("#tablero").html(perdedor);
	$("#ahorcado").attr("src","../resources/murio.png");
	return;
}
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
	for(var i=0; i<arr.length; i++)
		tabla = tabla+"<td>"+arr[i]+"</td>";
	tabla = tabla+"</tr></table>";
	
	return tabla;
}
function inicializarArr(lon)
{
	var cadArr = " ";
	for(var i=1; i<lon; i++)	//inicializa el arreglo-cadena llenandolo de espacios
		cadArr = cadArr+". ";
	return cadArr;
}
$("#empezar").click(function(event){		//click en el boton de juego nuevo
	$.ajax({
		url:"../programs/juego.php",
		data:{ materia:$("#materia").val() },
		type:"POST",
		dataType:"text",
		success:function(data){
			var datos = data.split(",");		//data tiene concatenados la pregunta y la respuesta separadas por una coma
			
			document.cookie = "palabra="+datos[1]+";";
			//console.log(datos[1]);
			
			cadArr = inicializarArr(datos[1].length);
			document.cookie = "arreglo="+cadArr+";";
			document.cookie = "puntos=1;";
			
			var tabla = hacerTabla(cadArr);
			tabla = '<div class="row" id="tabla-div">'+tabla+'</div>';
			
			var inputLetra = '<div class="row"><input type="text" id="letraU" class="form-control" maxlength="1" size="1"/></div>';
			inputLetra = inputLetra+'<div class="row"><button type="button" id="btn-res" class="btn btn-primary btn-md center-block">Probar</button></div>';
			
			$("#ahorcado").attr("src","../resources/punt1.png");
			$("#tablero").html('<div class="row"><h3>'+datos[0]+'</h3></div>'+tabla+inputLetra);
			//$("#btn-res").click(respuesta());
		}
	});
});

$("#tablero").on("click","#btn-res",function()		//evento cada que meta una letra
{		
	var puntos = parseInt(getCookie("puntos"));
	
	if(puntos<=6)
	{
		var letra = $("#letraU").val();		//falta validar con regex
		var palabraArr = getCookie("palabra").split("");
		var arregloArr = getCookie("arreglo").split(".");
		var resultado = false;
		
		for(var i=0; i<palabraArr.length; i++)
			if(palabraArr[i] == letra)
			{
				arregloArr[i] = letra;
				resultado = true;
			}
		
		if(!resultado)
		{
			puntos++;
			if(puntos <= 6)
				$("#ahorcado").attr("src","../resources/punt"+puntos.toString()+".png");
			else
				perdiste();
		}
		else if(getCookie("palabra") == arregloArr.join(""))
		{
			var ganador = '<div class="row"><h3>¡Has ganado!</h3></div><div class="col-md-2">La respuesta es '+getCookie("palabra")+'</div>';
			ganador = ganador+'<div class="row"><a href="../programs/Inicio.php" class="btn btn-warning btn-lg" role="button">¿Quieres jugar de nuevo?</a></div>';
			$("#tablero").html(ganador);
			$("#ahorcado").attr("src","../resources/vivio.png");
		}
		else
			console.log(getCookie("palabra")+"$"+getCookie("arreglo").split(".").join(""));
				
		arregloCad = arregloArr.join(".");
		
		document.cookie = "arreglo="+arregloCad+";";
		$("#tabla-div").html(hacerTabla(arregloCad));
	}
	else{
		perdiste();
	}
	document.cookie = "puntos="+puntos.toString()+";";
});