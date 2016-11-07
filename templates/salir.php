<?php
session_name('actual');
session_start();
echo '<!DOCTYPE html>
<html>
	<head>
		<title>Ahorcado</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="..\styles\disenio.css"/>
	</head>
	<body>
		<header><h1>Ahorcado</h1></header>
		<form action="login.html">
			<input type="submit" value="Volver a página principal"/>
		</form>
	</body>
</html>';
session_unset();
session_destroy();
?>