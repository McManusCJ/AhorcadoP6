<?php
function valUsuario()
{
	if(preg_match('/\w{3,10}/',$_POST['usuario']))
	{
		$cont=0;
		$val=TRUE;
		if(is_file('..\resources\registros.txt'))
		{
			$usuarios=file("../resources/registros.txt");
			$num=count($usuarios);
			while($val===TRUE && $cont<$num)
			{
				$cad=trim($usuarios[$cont]);
				$arr=explode(',',$cad);
				if($arr[0]!=$_POST['usuario'])
					$val=TRUE;
				else
					$val=FALSE;
				$cont++;
			}
		}		
	}
	else
	{
		echo 'Nombre de usuario inválido<br/>';
		$val=FALSE;
	}
	return $val;
}
function valNombre()
{
	if(preg_match('/^[A-z]{3,10}$/',$_POST['nombre']))
		$val=TRUE;
	else
	{
		echo 'Nombre inválido<br/>';
		$val=FALSE;
	}
	return $val;
}
function valContra()
{
	if(preg_match('/[\S^,^;]{8,12}/',$_POST['contra']))
		$val=TRUE;
	else
	{
		echo 'Contraseña inválida<br/>';
		$val=FALSE;
	}
	return $val;
}
?>