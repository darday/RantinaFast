<?php
	if(!isset($_SESSION['user'])){
		session_unset();
        session_destroy();
		header('location: index.php');
	}
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
				<div class="titulo col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<h2>Administración</h2>
				<h6><?php  ?></h6>
				</div>
				<div class="info col-xs-12 col-sm-12 col-md-6 col-lg-6 row">
					<div class="fecha col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h6><?php date_default_timezone_set('America/Bogota');
						echo "Rocafuerte, " . date("j") . " del " . date("n") . " de " . date("Y");?></h6>
					</div>

					<div class="usuario col-xs-12 col-sm-12 col-md-9 col-lg-9 row">
						<h5><?php echo $user->getNombre();  ?></h5>
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
					<div class="contenido-menu col-xs-12 col-sm-12 col-md-12 col-lg-12">

						
								
								<h6>Productos</h6>
								<a onclick="cargarIngresarProducto();" title="Ingresar Producto" ><i class="fas fa-plus-square" style="font-size:20px;"></i></a>
								<a onclick="cargarListarProducto();" title="Listar Productos"><i class="fa fa-list-alt" style="font-size:20px;"></i></a>
								<h6>Control Envase</h6>
								<a onclick="agregarCategoria();" title="Agregar Categoría" ><i class="fas fa-plus-square" style="font-size:20px;"></i></a>
								<a onclick="actualizarBodega();" title="Existencia Bodega"><i class="fa fa-list-alt" style="font-size:20px;"></i></a>
								<h6>Registro Bodega</h6>
								<a onclick="cargarRegistro();" title="Cambios Bodega"><i class="fa fa-list-alt" style="font-size:20px;"></i></a>
							<!--	<a onclick="cargarGanancias();" title="Reporte Ganancias"><i class="fa fa-money-check" style="font-size:20px;"></i></a> -->
					</div>
				</aside>

				<article id="contenidodinamico" class=" col-xs-12 col-sm-8 col-md-9 col-lg-9">
					<img  src="img/banner.jpg" class="img-fluid" alt="Responsive image">
				</article>
			</section>
	</div>

	<footer>
		<div class="container">
			<h6>La Colmena - Rocafuerte - 2020</h6>
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
