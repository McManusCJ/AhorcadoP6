<!--Nueva version-->
<!DOCTYPE html>
<html>
	<head>
		<title>Ahorcado</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet"/>
		<link rel="stylesheet" href="../styles/disenio.css"/>
	</head>
	<body>
		<?php
		session_name("actual");
		session_start();
		if(isset($_SESSION["nombre"]) && isset($_SESSION["tipo"]))
		{
			$conexion=mysqli_connect('localhost','root','','AHORCADO'); //establece conexión con la DB AHORCADO
			mysqli_set_charset($conexion,"utf8");
			
			if($_SESSION['tipo'] == 'J')
			{
				echo '<header><h1>Ahorcado de '.$_SESSION["nombre"].'</h1></header>
				<div class="container">
					<section class="row">
						<div class="col-md-3 info">Has jugado * veces</div>
						<div class="col-md-3 col-md-offset-2 info">Has ganado * veces</div>
						<div class="col-md-1 col-md-offset-3">
							<button id="salir" class="btn btn-primary btn-md" type="button">Salir</button>
						</div>
					</section>
					<section class="row" id="juego">
						<div id="tablero" class="col-md-3 col-md-offset-1 regresar">
							<div class="form-group">
								<label for="materia">Escoge una materia</label>
								<select id="materia" class="form-control">';
									$res = mysqli_query($conexion,'SELECT * FROM MATERIA');
									for($x=0;$x<mysqli_num_rows($res);$x++)
									{
										$materias = mysqli_fetch_array($res);
										echo '<option value="'.$materias[0].'">'.$materias[1].'</option>';
									}
							echo '</select>
							</div>
							<button type="button" class="btn btn-primary center-block" id="empezar">Empezar Juego Nuevo</button>							
						</div>
						<div class="col-md-7 col-md-offset-1">
							<img id="ahorcado" src="../resources/punt5.png" class="img-responsive">
						</div>
					</section>
				</div>';
			}
			else if($_SESSION["tipo"] == 'A')
			{
				echo 'admin';
			}
		}
		else
			echo '<h1>Ahorcado</h1>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 info regresar">
						<h3>Debes ingresar como usuario para ver esta página</h3>
						<a class="btn btn-default regresar" href="../templates/login.html" role="button">Ir a página principal</a>
					</div>
				</div>
			</div>
			';
		?>
		<script src="../programs/jquery-2.2.3.js"></script>
		<script src="../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
		<script src="../programs/inicio.js"></script>
		<script src="../programs/salir.js"></script>
	</body>
</html>