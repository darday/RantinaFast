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



</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="titulo col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
				<h2>MI NEGOCIO</h2>
				<h6><?php  ?></h6>
				</div>
				<div class="info col-xs-12 col-sm-12 col-md-6 col-lg-6 row">
					<div class="fecha col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h6><?php date_default_timezone_set('America/Bogota');
						echo "Rocafuerte, " . date("j") . " del " . date("n") . " de " . date("Y");?></h6>
					</div>

					<div class="usuario col-xs-12 col-sm-12 col-md-9 col-lg-9 row">
						<h5><?php echo $row['nombre_local']   ?></h5>
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

				<article id="contenidodinamico" class=" col-xs-12 col-sm-8 col-md-9 col-lg-9 text-center">
					<img  src="img/prov/<?php echo $row['logo'];?> " class="img-fluid" alt="Responsive image">
				</article>
			</section>
	</div>

	<?php include_once 'components/footer.php'; ?>


</body>
</html>
