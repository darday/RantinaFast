
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Administración</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/icono/favicon.ico"/>
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
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(img/cabecera_login.jpg);">
					<span class="login100-form-title-1">Registro &nbsp; Proveedor</span>
				</div>
					
				<form class="login100-form validate-form" method="post" action="registrar_proveedor.php" enctype="multipart/form-data">
					
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
							<a href="registrar_select.php">
								<input name="Borrar" type="button" class="login100-form-btn" value="Cancelar">
							</a>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>