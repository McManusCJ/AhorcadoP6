<?php
include_once 'funcionesCookieF.php';
session_name('actual');
session_start();
$adiv=$_COOKIE['arreAdiv'];	//string
$arrAdiv=explode(' ',$adiv);
$pun=$_COOKIE['puntaje'];	//int
settype($pun,'int');

echo '<!DOCTYPE html>
<html>
	<head>
		<title>Ahorcado</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="..\styles\disenio.css"/>
	</head>
	<body>
		<header><h1>Ahorcado</h1></header>';

		if(str_replace(' ','',$adiv)!=$_COOKIE['palab'])	//si lo adivinado es diferente a la palabra
		{
			checar($arrAdiv,$pun);		//por referencia
			if($pun<=6)
			{
				imprimirTablaImagen($arrAdiv,$pun);
				
				$adiv=implode(' ',$arrAdiv);		//convierte a string
				if(str_replace(' ','',$adiv)==$_COOKIE['palab'])
					ganaste();
				else
					echo'<form action="AhorcadoCookieF.php" method="get">
							Trata de adivinar: <input type="text" name="letra" maxlength="1"/>
							<input type="submit" value="Adivina"/>
						</form>';
			}
			else
				perdiste();
		}
		else
			ganaste();
echo'</body>
</html>';

$adiv=implode(' ',$arrAdiv);		//convierte a string
setcookie('arreAdiv',$adiv);	//guarda lo ya adivinado en una cookie
setcookie('puntaje',$pun);
?>