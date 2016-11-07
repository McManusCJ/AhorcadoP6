<?php
include_once 'funcionesValidar.php';

echo '<!DOCTYPE html>
<html>
	<head>
		<title>Ahorcado</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="..\styles\disenio.css"/>
	</head>
	<body>
		<header><h1>Ahorcado</h1></header>';
if(isset($_POST['nombre']) && isset($_POST['usuario']) && isset($_POST['contra']))
{
	
	if(valUsuario() && valNombre() && valContra())
	{
		$registros=fopen("../resources/registros.txt","a+");
		$nombre=strtoupper($_POST['nombre']);
		$usser=$_POST['usuario'];
		$contrasenia=$_POST['contra'];
		$nuevo=$usser.','.$nombre.','.$contrasenia;
		fputs($registros,$nuevo.PHP_EOL);
		fclose($registros);
		echo '<h2>Registro exitoso</h2>
		<form action="usuario.html"><input type="submit" value="Iniciar sesión"/></form>';
	}
	else
		echo '<div>Datos inválidos</div>
			<form action="registro.html"><input type="submit" value="Regresar"/></form>';
}
else
	echo '<div>Datos incompletos</div>
		<form action="registro.html"><input type="submit" value="Regresar"/></form>';

echo '</body>
</html>';
?>