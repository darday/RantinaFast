<?php

session_start();
require_once('user.php');
require_once('user_session.php');
$correo=$_SESSION['user'];
	if(!isset($_SESSION['user'])){
		session_unset();
        session_destroy();
		header('location: index.php');
	}

require_once ('lacolmenadata/conexion.php');

$id_query = "Select * from usuarios where correo='$correo'";
$run = mysqli_query($conn, $id_query);
$row = mysqli_fetch_array($run);

//echo $row['idusuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administración</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
	<link rel="icon" type="image/png" href="img/icono/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="img/icono/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->

</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="titulo col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
				<h2>EDITAR INFORMACIÓN</h2>
				<h6><?php  ?></h6>
				</div>
				<div class="info col-xs-12 col-sm-12 col-md-6 col-lg-6 row">
					<div class="fecha col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h6><?php date_default_timezone_set('America/Bogota');
						echo "Rocafuerte, " . date("j") . " del " . date("n") . " de " . date("Y");?></h6>
					</div>

					<div class="usuario col-xs-12 col-sm-12 col-md-9 col-lg-9 row">
						<h5><?php echo $row['nombre_local']  ?></h5>
					</div>
					<div class="salir col-xs-12 col-sm-12 col-md-4 col-lg-4 row">
						<h6 class="tsalir">Salir</h6><a href="logout.php" title="Salir" class="btn_salir"><i class="fas fa-sign-out-alt" style="font-size:36px;"></i></a>
					</div>

				</div>
			</div>
		</div>
	</header>

	<div class="container">
			<section class="main row">
				<aside class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<?php include_once 'components/sidebar.php'; ?>
				</aside>

				<article id="contenidodinamico" class=" col-xs-12 col-sm-8 col-md-9 col-lg-9">
				<form class="login100-form validate-form" method="post" action="panel_prov_editprov.php" enctype="multipart/form-data">
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="El campo nombre es obligatorio">
						<span class="label-input100">Nombre del Local:</span>
						<input class="input100" type="text" name="nombre_local" value="<?php echo $row['nombre_local']?>" placeholder="Ingrese el nombre de su local">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="El campo dirección es obligatorio">
						<span class="label-input100">Dirección: </span>
						<input class="input100" type="text" name="direccion" value="<?php echo $row['direccion']?>"  placeholder="Ingrese la dirección de su local">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="El campo Hora es obligatorio">
						<span class="label-input100">Hora Apertura:</span>
						<input class="input100" type="time" name="hora_apertura" value="<?php echo $row['hora_apertura']?>"  placeholder="Ingrese la hora de Apertura">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="El campo Hora es obligatorio">
						<span class="label-input100">Hora Cierre:</span>
						<input class="input100" type="time" name="hora_cierre" value="<?php echo $row['hora_cierre']?>" placeholder="Ingrese la hora de Cierre">
						<span class="focus-input100"></span>
					</div>

					
					<div class="wrap-input100 validate-input m-b-26" data-validate="El campo file es obligatorio">
						<span class="label-input100">Logo de local:</span>
						<input class="input100" type="file" name="logo" value="<?php echo $row['logo']?>" placeholder="Ingrese una Imagen">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="El campo file es obligatorio">
						<span class="label-input100">Propietario:</span>
						<input class="input100" type="text" name="nombres" value="<?php echo $row['nombres']?>" placeholder="Ingrese una Imagen">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="El campo file es obligatorio">
						<span class="label-input100">Correo:</span>
						<input class="input100" type="text" name="correo" value="<?php echo $row['correo']?>" placeholder="Ingrese una Imagen">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "La constraseña es obligatoria">
						<span class="label-input100">CLAVE:</span>
						<input class="input100" type="password" name="pass"value="<?php echo $row['pass']?>" placeholder="Ingrese su contraseña">
						<span class="focus-input100"></span>
					</div>

					<input  type="hidden" name="idusuario" value="<?php echo $row['idusuario']?>">

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox"><br>
							<input type="submit" name="submit" value="Registrar" class="login100-form-btn">
						</div>
						<div><br>
							<a href="panel_prov.php">
								<input name="Borrar" type="button" class="login100-form-btn" value="Cancelar">
							</a>
						</div>

					</div>
				</form>
				</article>
			</section>
	</div>

	<footer>
		<div class="container">
			<h6>RantinaFast - 2020</h6>
		</div>
	</footer>


	<script src="css/jsindex.js"></script>
	<script src="js/jsindex.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/jquery-1.10.2.js"></script>
	

</body>
</html>
