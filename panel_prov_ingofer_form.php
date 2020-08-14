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
<?php include_once 'components/header.php'; ?>

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
