<?php
function inicializarArreglo(&$arreglo,$medida)
{
	$arreglo=NULL;
	for($i=0;$i<$medida;$i++)
		$arreglo[$i]='&nbsp;';
	return;
}
function juegoNuevo()	//obtiene nueva palabra del diccionario y asigna sesiones
{	
	$vocabulario=file('../resources/vocabularios/vocabulario.txt');
	$aleat=rand(0,19);
	$palabraN=$vocabulario[$aleat];	//escoge palabra aleatoria del vocabulario
	$palabraN=trim($palabraN);
	//echo $palabraN.'.<br/>';
	setcookie('palab',$palabraN);		//cookie de palabra a adivinar
	
	$longN=strlen($palabraN);
	setcookie('long',$longN);					//cookie de longitud de palabra
	
	inicializarArreglo($progresoN,$longN);		//funcion declarada mas arriba
	$strProg=implode(' ',$progresoN);			//convierte a string
	setcookie('arreAdiv',$strProg);				//cookie de lo ya adivinado
	
	setcookie('puntaje',1);
	
	return;
}
function checar(&$arr,&$puntos)
{
	$pos=0;
	$pal=$_COOKIE['palab'];
	if(isset($_GET['letra']))
	{
		$char=$_GET['letra'];
		if(preg_match('/[A-z]{1}/',$char))
		{
			$veces=substr_count($pal,$char);	//cuantas veces esta el caracter en la palabra		
			if($veces===0)
				$puntos++;
			else
				for($i=0;$i<$veces;$i++)			
				//escribe en el arreglo, el caracter adivinado en sus posiciones correspondientes
				{
					$pos=strpos($pal,$char,$pos+1);
					$arr[$pos]=$char;
				}
		}
		else
			$puntos++;
	}
	return;
}
function imprimirTablaImagen($arr,$punt)
{	
	echo '<table><tr>';			//imprime el arreglo en una tabla
		for($i=0;$i<$_COOKIE['long'];$i++)
			echo '<td>'.$arr[$i].'</td>';
	echo '</tr></table>';
	echo '<img src="..\resources\punt'.$punt.'.png" alt="Monito Ahorcado" width="40%"/>';
	return;
}
function ganaste()
{
	echo '
	<div id="cubrir">
		<h2>Ganaste!</h2>
		<img src="..\resources\vivio.png" alt="Viviste" width="50%" class="fin"/>
		<form action="Inicio.php" method="GET" class="btnFn"><input type="submit" value="Regresar"/></form>
	</div>';
	$_SESSION['pun']=intval($_SESSION['pun'])+1;
	return;
}
function perdiste()
{
	echo '<h2>Perdiste!</h2>
		<img src="..\resources\murio.png" alt="Moriste" width="50%" class="fin"/>';
	echo '<form action="Inicio.php" method="GET" class="btnFn"><input type="submit" value="Regresar"/></form>';
	return;
}
?>