<?php
session_start();
require_once('user.php');
require_once('user_session.php');
$correo=$_SESSION['user'];
$id_not=$_GET['edit'];

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
                $query = "Select * from noticias where id_noticia = $id_not   ";
                $run = mysqli_query($conn, $query);
				$row2 = mysqli_fetch_array($run);

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
				<h2>EDITAR NOTICIA</h2>


					<form class="login100-form validate-form" method="post" action="admin_editnot.php" enctype="multipart/form-data">
						
						<div class="wrap-input100 validate-input m-b-26" data-validate="El campo nombre es obligatorio">
							<span class="label-input100">Titulo:</span>
							<input class="input100" type="text" name="titulo" value="<?php echo $row2['titulo']?>" placeholder="Ingrese el nombre de su local">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-26" data-validate="El campo dirección es obligatorio">
							<span class="label-input100">fecha: </span>
							<input class="input100" type="date" name="fecha" value="<?php echo $row2['fecha']?>" placeholder="Ingrese la dirección de su local">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-26" data-validate="El campo Hora es obligatorio">
							<span class="label-input100">Estado</span>
							<select class="form-control" name="estado">
								<option selected value="<?php echo $row2['estado']?>" ><?php echo $row2['estado']?></option>
								<option value="Publico">Público</option>
								<option value="Oculto">Oculto</option>
							</select>
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-26" data-validate="El campo Hora es obligatorio">
							<span class="label-input100">Descripción:</span>
							<div class="form-group">
								
								<textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="7"><?php echo $row2['descripcion']?></textarea>
							</div>
							<span class="focus-input100"></span>
						</div>

						
						<div class="wrap-input100 validate-input m-b-26" data-validate="El campo file es obligatorio">
							<span class="label-input100">Imagen de Noticia:</span>
							<input class="input100" type="file" name="imagen" placeholder="Ingrese una Imagen">
							<span class="focus-input100"></span>
						</div>

						
						<input type="hidden" name="id_not" value="<?php echo $id_not?>">
					

						<div class="flex-sb-m w-full p-b-30">
							<div class="contact100-form-checkbox"><br>
								<input type="submit" name="submit" value="Editar" class="login100-form-btn">
							</div>
							<div><br>
								<a href="registrar_select.php">
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
