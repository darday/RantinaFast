<?php
//session_start();
require_once('user.php');
require_once('user_session.php');
$correo=$_SESSION['user'];
	if(!isset($_SESSION['user'])){
		session_unset();
        session_destroy();
		header('location: indexlog.php');
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
	<link rel="stylesheet" type="text/css" href="css/rantinaStyle.css">



</head>
<body>
	<header class="verdeoscuro">
		<?php include_once 'components/header_prov.php'; ?>

	</header>

	<div class="container">
			<section class="main row">
				<aside class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<?php include_once 'components/sidebar.php'; ?>
				</aside>

				<article id="contenidodinamico" class=" col-xs-12 col-sm-8 col-md-9 col-lg-9 ">
					<div class="div text-LEFT">
						<h1>BIENVENIDO A RANTINAFAST</h1>
						<hr>
						<br>
						<br>
						
					</div>
					<div class="text-center">
						<img  src="img/prov/<?php echo $row['logo'];?> " class="img-fluid" alt="Responsive image">
						<br>
						<br>
						<br>
					</div>
				</article>
			</section>
	</div>
	
	<?php include_once 'components/footer.php'; ?>

	


</body>
</html>
