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
		if(isset($_POST['uss']) && isset($_POST['cont']))
		{
			$n=0;
			$val=FALSE;
			$todos=file('..\resources\registros.txt');
			$num=count($todos);
			while($val===FALSE && $n<$num)
			{
				$uno=trim($todos[$n]);	//datos de un usuario
				$arr=explode(',',$uno);
				if($arr[0]==$_POST['uss'])
					$val=TRUE;
				else
					$val=FALSE;
				$n++;
			}
			$admin=trim($todos[0]);
			$arrAdmin=explode(',',$admin);
			if($_POST['uss']==$arrAdmin[0])
			{
				if($_POST['cont']==$arrAdmin[1])
					echo '<h2>Has entrado como administrador</h2>
						<form action="admin.html"><input type="submit" value="Continuar"/></form>';
				else
					echo 'No puedes acceder como administrador. La constraseña es incorrecta';
			}
			else
			{
				if(!$n<$num && $val===FALSE)
					echo '<div>Ese usuario no existe</div>
						<form action="usuario.html"><input type="submit" value="Regresar"/></form>';
				elseif($val===TRUE)
				{
					$con=$arr[2];
					if($con==$_POST['cont'])
					{
						session_name('actual');
						session_start();
						$_SESSION['usu']=$arr[0];
						$_SESSION['nom']=$arr[1];
						$_SESSION['pun']=0;
						echo '<h2 id="nombre">Bienvenido '.$_SESSION['nom'].'</h2>
							<form action="Inicio.php"><input type="submit" value="Continuar" id="tercero"/></form>';
					}
					else
						echo 'Contraseña incorrecta';
				}
			}
	}
	else
		echo 'Datos incompletos
			<form action="usuario.html"><input type="submit" value="Regresar"/></form>';
	echo '</body>
	</html>';
?>