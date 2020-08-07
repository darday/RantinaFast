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
			<div class="row text-center">
				
				<div class="titulo col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
				<h2>RANTINA FAST</h2>
				<h6><?php  ?></h6>
				</div>
				<div class="info col-xs-12 col-sm-12 col-md-6 col-lg-6 row">
					<div class="fecha col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h6><?php date_default_timezone_set('America/Bogota');
						echo "Rocafuerte, " . date("j") . " del " . date("n") . " de " . date("Y");?></h6>
					</div>

					<div class="usuario col-xs-12 col-sm-12 col-md-9 col-lg-9 row">
						<h5><?/*php echo $user->getNombre();  */?></h5>
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
					<form class="login100-form validate-form" method="post" action="panel_prov_ingofer.php">
						<div class="wrap-input100  m-b-26 text-center" data-validate="Campo Obligatorio">
							<h1>AGREGAR OFERTA</h1>
						</div>

						<div class="wrap-input100 validate-input m-b-26" data-validate="Campo Obligatorio">
							<span class="label-input100">NOMBRE OFERTA:</span>
							<input class="input100" type="text" name="nombre_producto" placeholder="Nombre del Producto">
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input m-b-26" data-validate="Campo Obligatorio">
							<span class="label-input100">DESCRIPCION:</span>
							<textarea class="form-control input100" name="medida" id="exampleFormControlTextarea1" rows="4"></textarea>
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-26" data-validate="Campo Obligatorio">
							<span class="label-input100">PRECIO:</span>
							<input class="input100" type="text" name="precio" placeholder="Ingrese el precio ">
							<span class="focus-input100"></span>
						</div>

						
						<input type="hidden" name="id_local" value="<?php echo $row['idusuario']?>"  >
						<input type="hidden" name="id_tipo" value="2"  >

						<div class="flex-sb-m w-full p-b-30">
							<div class="contact100-form-checkbox"><br>
								<input type="submit" name="submit" value="Registrar" class="login100-form-btn">
							</div>
							<div><br>
								<a href="panel_prov.php">
								<input name="Borrar" type="button" class="login100-form-btn" value="Cancelar"></a>
							</div>
						</div>
					</form>
				</article>
			</section>
	</div>

	<?php include_once 'components/footer.php'; ?>
	

</body>
</html>
