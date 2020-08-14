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

 require_once ('lacolmenadata/conexion.php');                              

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
				<h2>AGREGAR PROVEEDOR</h2>


					<form class="login100-form validate-form" method="post" action="admin_ingprov.php" enctype="multipart/form-data">
						
						<div class="wrap-input100 validate-input m-b-26" data-validate="El campo nombre es obligatorio">
							<span class="label-input100">Nombre del Local:</span>
							<input class="input100" type="text" name="nombre_local" placeholder="Ingrese el nombre de su local">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-26" data-validate="El campo dirección es obligatorio">
							<span class="label-input100">Dirección: </span>
							<input class="input100" type="text" name="direccion" placeholder="Ingrese la dirección de su local">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-26" data-validate="El campo Hora es obligatorio">
							<span class="label-input100">Hora Apertura:</span>
							<input class="input100" type="time" name="hora_apertura" placeholder="Ingrese la hora de Apertura">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-26" data-validate="El campo Hora es obligatorio">
							<span class="label-input100">Hora Cierre:</span>
							<input class="input100" type="time" name="hora_cierre" placeholder="Ingrese la hora de Cierre">
							<span class="focus-input100"></span>
						</div>

						
						<div class="wrap-input100 validate-input m-b-26" data-validate="El campo file es obligatorio">
							<span class="label-input100">Logo de local:</span>
							<input class="input100" type="file" name="logo" placeholder="Ingrese una Imagen">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-26" data-validate="El campo file es obligatorio">
							<span class="label-input100">Propietario:</span>
							<input class="input100" type="text" name="nombres" placeholder="Ingrese una Imagen">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-26" data-validate="El campo file es obligatorio">
							<span class="label-input100">Correo:</span>
							<input class="input100" type="text" name="correo" placeholder="Ingrese una Imagen">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-18" data-validate = "La constraseña es obligatoria">
							<span class="label-input100">CLAVE:</span>
							<input class="input100" type="password" name="pass" placeholder="Ingrese su contraseña">
							<span class="focus-input100"></span>
						</div>

						<input  type="hidden" name="tipo" value="2">

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

	<?php include_once 'components/footer.php'; ?>


</body>
</html>
