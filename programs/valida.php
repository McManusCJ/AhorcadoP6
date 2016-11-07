<?php
if(isset($_POST['nombre']) && isset($_POST['usuario']) && isset($_POST['contra']))
{
	$conexion=mysqli_connect('localhost','root','','AHORCADO'); //establece conexión con la DB AHORCADO
	mysqli_set_charset($conexion,"utf8");
	$uss=mysqli_real_escape_string($conexion,$_POST['usuario']);
	$query1='SELECT USUARIO_USS FROM USUARIO WHERE USUARIO_USS="'.$uss.'"';
	$res=mysqli_query($conexion,$query1);
	if(mysqli_num_rows($res)!=0)
		echo 'existe';
	else
		echo 'pasa';
}
else
	echo "incompleto";
?>