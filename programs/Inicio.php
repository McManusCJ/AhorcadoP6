<!--Es la pantalla de inicio de cada jugador-->
<?php
include_once 'funcionesCookieF.php';
session_name('actual');
session_start();
//echo $_SESSION['nom'].'<br/>';
echo '<!DOCTYPE html>
<html>
	<head>
		<title>Ahorcado</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="..\styles\disenio.css"/>
	</head>
	<body>
		<header><h1>Ahorcado de '.$_SESSION['nom'].'</h1></header>
		<div id="puntaje">Esta vez has ganado '.$_SESSION['pun'].' veces</div>
		<section class="int">
		<form action="AhorcadoCookieF.php" method="POST">
			<input type="submit" value="Empezar juego nuevo" class="primero"/>
		</form>
		<form action="salir.php">
			<input type="submit" value="Cerrar sesión" class="segundo"/>
		</form>
		</section>
	</body>
</html>';
juegoNuevo();
?>