<?php
echo '<!DOCTYPE html>
<html>
	<head>
		<title>Ahorcado</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="..\styles\disenio.css"/>
	</head>
	<body>
		<header><h1>Ahorcado</h1></header>';
		echo 'n'.$_FILES['voc']['type'].'n';
		if(isset($_FILES['voc']) && isset($_POST['tema']) && $_FILES['voc']['type']=='txt' && $_FILES['voc']['error']!=1)
		{
			$destino='..\\resources\\vocabularios\\'.$_POST["tema"].'.txt';
			if(move_uploaded_file($_FILES['voc'],$destino))
			{
				echo 'Archivo subido exitosamente';
				$arch=fopen('..\resources\vocabularios\catalogo.txt',"a+");
				fputs($_POST['tema'].PHP_EOL);
				fclose($arch);
			}
			else
				echo 'Hubo un error';
		}
		else
			echo 'Hubo un error al subir el archivo';
	echo '<form action="admin.html"/><input type="submit" value="Regresar"/></form>
	</body>
</html>';
?>