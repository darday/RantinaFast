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

 /*****permisos****** */

 $id_query = "Select * from usuarios where correo = '$correo'   ";
 $run2=mysqli_query($conn, $id_query);
 $row = mysqli_fetch_array($run2);
 $tipo=$row['tipo'];
 //echo $tipo;
 if($tipo == 3){
  $query = "Select * from usuarios where tipo = 1   ";
  $run = mysqli_query($conn, $query);

 }else{
   echo ("No tiene permiso para ver esta página");
   return ;
 }

 /************fin permisos */


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
		<?php include_once 'components/header_admin.php'; ?>
	</header>

	<div class="container">
			<section class="main row">
				<aside class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<?php include_once 'components/sidebar_admin.php'; ?>
				</aside>

				<article id="contenidodinamico" class=" col-xs-12 col-sm-8 col-md-9 col-lg-9 text-center">
					<?php
						//$msg =;
						//echo $msg;
						if (isset($_GET['msg'])) {
							$msg=$_GET['msg'];
							echo "<div class='alert alert-danger' style='color:green;><i class='fa fa-close'></i>$msg</div>";
						} else if (isset($error)) {
							echo "<div class = 'alert alert-success' role = 'alert' style = 'color:red;'><i class='fa fa-close'></i>$error
						</div>";
						}
					?>
				<h2>AGREGAR CLIENTE</h2>
					<form class="login100-form validate-form" method="post" action="admin_ingclien.php">


						<div class="wrap-input100 validate-input m-b-26" data-validate="El nombre de usuario es obligatorio">
							<span class="label-input100">NOMBRES:</span>
							<input class="input100" type="text" name="nombres" placeholder="Ingrese su nombre y apellido">
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input m-b-26" data-validate="El nombre de usuario es obligatorio">
							<span class="label-input100">CEDULA:</span>
							<input class="input100" type="text" name="ci" placeholder="Ingrese su cédula de identidad">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-26" data-validate="El nombre de usuario es obligatorio">
							<span class="label-input100">CORREO:</span>
							<input class="input100" type="email" name="correo" placeholder="Ingrese su correo electrónico">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-26" data-validate="El nombre de usuario es obligatorio">
							<span class="label-input100">DIRECCION:</span>
							<input class="input100" type="text" name="direccion" placeholder="Ingrese su nombre y apellido">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-26" data-validate="El nombre de usuario es obligatorio">
							<span class="label-input100">TELEFONO:</span>
							<input class="input100" type="text" name="telefono" placeholder="Ingrese su nombre y apellido">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-18" data-validate="La constraseña es obligatoria">
							<span class="label-input100">CLAVE:</span>
							<input class="input100" type="password" name="pass" placeholder="Ingrese su contraseña">
							<span class="focus-input100"></span>
						</div>
						<input type="hidden" name="tipo" value="1">
						<div class="flex-sb-m w-full p-b-30">
							<div class="contact100-form-checkbox"><br>
								<input type="submit" name="submit" value="Registrar" class="login100-form-btn">
							</div>
							<div><br>
								<input name="Borrar" type="reset" class="login100-form-btn" value="Limpiar">
							</div>
						</div>
					</form>
				</article>
			</section>
	</div>

	<?php include_once 'components/footer.php'; ?>


</body>
</html>
