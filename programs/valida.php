<?php
if(isset($_POST['usuario']) && isset($_POST['contra']) && isset($_POST['nombre']))	//registrar usuario
{
	$conexion=mysqli_connect('localhost','root','','AHORCADO'); //establece conexión con la DB AHORCADO
	mysqli_set_charset($conexion,"utf8");
	$uss=mysqli_real_escape_string($conexion,$_POST['usuario']);
	$query='SELECT USUARIO_USS FROM USUARIO WHERE USUARIO_USS="'.$uss.'"';
	$res=mysqli_query($conexion,$query);
	if(mysqli_num_rows($res)!=0)	//si el usuario ya existe
		echo 'existe';
	else		//crea el usuario
	{
		echo 'pasa';
		$con=mysqli_real_escape_string($conexion,$_POST['contra'];
		$nom=mysqli_real_escape_string($conexion,$_POST['nombre']);
		$query='INSERT INTO USUARIO VALUES("'.$nom.'","'.$uss.'","'.$con.'","J");';
		$res=mysqli_query($conexion,$query);
	}
}
else if(isset($_POST['usuario-ini']) && isset($_POST['contra-ini']))	//entrar como usuario
	{
		$conexion=mysqli_connect('localhost','root','','AHORCADO'); //establece conexión con la DB AHORCADO
		mysqli_set_charset($conexion,"utf8");
		$usIn=mysqli_real_escape_string($conexion,$_POST['usuario-ini']);
		$conIn=mysqli_real_escape_string($conexion,$_POST['contra-ini']);
		$query='SELECT USUARIO_PSW,USUARIO_NOM FROM USUARIO WHERE USUARIO_USS="'.$usIn.'";';
		$res=mysqli_query($conexion,$query);
		if(mysqli_num_rows($res)!=0)
		{
			$arr=mysqli_fetch_assoc($res);
			if($arr['USUARIO_PSW']==$conIn)
			{
				session_name('actual');
				session_start();
				$_SESSION['nombre']=$arr['USUARIO_NOM'];
				$_SESSION['tipo']=$arr['USUARIO_TIP'];
				echo 'entraste';
			}
			else
				echo 'contrasenia incorrecta';
		}
		else
			echo 'nohay';
	}
	echo "incompleto";
?>