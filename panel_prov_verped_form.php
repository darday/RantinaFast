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
$id_fac=$_GET["fac"];
$id_query = "SELECT usuarios.nombres, usuarios.ci, usuarios.correo, factura.fecha, factura.telefono, factura.direccion,factura.id_factura FROM usuarios INNER JOIN factura ON usuarios.idusuario = factura.id_cliente WHERE factura.id_factura = $id_fac";
$run2 = mysqli_query($conn, $id_query);
$row2 = mysqli_fetch_array($run2);

$id_query2 = "SELECT producto.nombre_producto, producto.precio, venta.cantidad, factura.total FROM producto 
 INNER JOIN venta ON producto.id_producto = venta.id_producto INNER JOIN factura on venta.id_factura = factura.id_factura
  WHERE factura.id_factura = $id_fac";
$run3 = mysqli_query($conn, $id_query2);


//echo $row['idusuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
<?php include_once 'components/header.php'; ?>

</head>
<body>
	<header class="verdeoscuro">
	<div class="container ">
			<div class="row text-center">
				<div class=" col-xs-6 col-sm-6 col-md-4 col-lg-4 ">
					<img  src="img/rantina.png " style="margin-top: 7px;" width="185px" height="77px">				
				</div>				

				<div class=" col-xs-6 col-sm-6 col-md-5 col-lg-5  text-center">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h2>MI NEGOCIO</h2>
					</div>

					<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						<h5 style="color: white;" >PEDIDOS </h5>				
					</div>

				</div>
				
				<div class=" col-xs-12 col-sm-12 col-md-3 col-lg-3   text-center">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h6><?php date_default_timezone_set('America/Bogota');
						echo "Riobamba, " . date("j") . " del " . date("n") . " de " . date("Y");?></h6>
					</div>

					<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						<h6 >Salir</h6><a href="logout.php" title="Salir" class="btn_salir"><i class="fas fa-sign-out-alt" style="font-size:36px;"></i></a>
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
				<h1 style="text-align: center;">VER PEDIDO</h1>

				<form class="login100-form validate-form" method="post" action="panel_prov_verped.php" enctype="multipart/form-data">
					<div class="wrap-input100 validate-input m-b-26" data-validate="El campo nombre es obligatorio">
						<span class="label-input100">CLIENTE:</span>
						<input disabled class="input100" type="text" name="nombre_local" value=" <?php echo $row2["nombres"]?>" placeholder="Ingrese el nombre de su local">
						<span class="focus-input100"></span>
					</div>

					<!--<div class="wrap-input100 validate-input m-b-26" data-validate="El campo nombre es obligatorio">
						<span class="label-input100">CI:</span>
						<input disabled class="input100" type="text" name="nombre_local" value=" <?php echo $row2["ci"]?>" placeholder="Ingrese el nombre de su local">
						<span class="focus-input100"></span>
					</div>-->

					<div class="wrap-input100 validate-input m-b-26" data-validate="El campo dirección es obligatorio">
						<span class="label-input100">Dirección: </span>
						<input disabled class="input100" type="text" name="nombre_local" value=" <?php echo $row2["direccion"]?>" placeholder="Ingrese el nombre de su local">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="El campo dirección es obligatorio">
						<span class="label-input100">Teléfono: </span>
						<input disabled class="input100" type="text" name="nombre_local" value=" <?php echo $row2["telefono"]?>" placeholder="Ingrese el nombre de su local">
						<span class="focus-input100"></span>
					</div>

			
					<div class="wrap-input100 validate-input m-b-26" data-validate="El campo file es obligatorio">
						<span class="label-input100">Fecha:</span>
						<input disabled class="input100" type="text" name="nombres" value="<?php echo $row2['fecha']?>" placeholder="Ingrese una Imagen">
						<span class="focus-input100"></span>
					</div>
					
					
					<hr>
					<div class="wrap-input100 validate-input m-b-26" data-validate="El campo file es obligatorio">
						
					<table class="table">
						<thead>
							<tr>
							
							<th scope="col">Cantidad</th>
							<th scope="col">Producto</th>
							
							</tr>
						</thead>
						<tbody>
							<?php
						
						while($row3 = mysqli_fetch_array($run3)) {
							if ($row3 != null) {
						
							$cant = $row3["cantidad"];
							$nom = $row3["nombre_producto"];
							
							$total = $row3["total"];

							?>
							
									<tr>
									
									<td> <?php echo $cant; ?> </td>
									<td> <?php echo $nom; ?> </td>
									
																
									<?php
							}
						}
					
					?>
							
						</tbody>
					</table>



					</div>


					<div class="wrap-input100 validate-input m-b-26" data-validate="El campo file es obligatorio">
						<span class="label-input100">TOTAL DE FACTURA</span>
						<input disabled class="input100" type="text" name="nombres" value="<?php echo $total?>" placeholder="Ingrese una Imagen">
						<span class="focus-input100"></span>
					</div>

					<input  type="hidden" name="idfact" value="<?php echo $id_fac?>">

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox"><br>
							<input type="submit" name="submit" value="Entregar" class="login100-form-btn">
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
