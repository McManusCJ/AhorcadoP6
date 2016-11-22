<?php
$conexion=mysqli_connect('localhost','root','','AHORCADO'); //establece conexión con la DB AHORCADO
mysqli_set_charset($conexion,"utf8");
if(isset($_POST['materia']))
{
	$materia = mysqli_real_escape_string($conexion, $_POST['materia']);
	$res = mysqli_query($conexion,'SELECT * FROM PREGUNTA WHERE PREGUNTA_ASIG="'.$materia.'";');
	$n = mysqli_num_rows($res)-1;
	$aleat=rand(0,$n);
	for($x=0;$x<=$aleat;$x++)
		$filaPreg = mysqli_fetch_assoc($res);
	echo $filaPreg["PREGUNTA_PREG"].','.$filaPreg["PREGUNTA_RESP"];
}
?>