<?php 

	//include_once 'user.php';
	//include_once 'user_session.php';

	//$userSession = new UserSession();
	//$user = new User(); 

	$nombre_local =  $_POST['nombre_local'];
	$direccion =  $_POST['direccion'];
	$hora_apertura =  $_POST['hora_apertura'];
	$hora_cierre =  $_POST['hora_cierre'];
	//$logo =  $_POST['logo'];
	$nombres =  $_POST['nombres'];
	$correo =  $_POST['correo'];
	$pass =  $_POST['pass'];
	$tipo =  $_POST['tipo'];
	$logo = $_FILES['logo']['name'];
	$tmp_name = $_FILES['logo']['tmp_name'];
	echo $tipo;
	require_once 'lacolmenadata/conexion.php';
	$insert_query = "INSERT INTO usuarios (nombre_local, direccion, hora_apertura, hora_cierre, logo, nombres,correo,pass,tipo ) 	VALUES ('$nombre_local','$direccion','$hora_apertura','$hora_cierre','$logo', '$nombres','$correo','$pass','$tipo') ";
	//$run= mysqli_query($conn, $insert_query);
	
	if (mysqli_query($conn, $insert_query)) {
		$msg = "Información Subida";
		
		$title = "";
		$post_data = "";
		$path = "img/prov/$logo";
		if (move_uploaded_file($tmp_name, $path)) {
			copy($path, "../$path");
		}
	} else {
		$error = "Información no añadida";
	}

	$msg="Proveedor Agregado";
	header("Location: admin_ingprov_form.php?msg=$msg");

?>