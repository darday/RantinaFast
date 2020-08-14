<?php 

	$titulo =  $_POST['titulo'];
	$fecha =  $_POST['fecha'];
	$estado =  $_POST['estado'];
	$descripcion =  $_POST['descripcion'];

	$imagen = $_FILES['imagen']['name'];
	$tmp_name = $_FILES['imagen']['tmp_name'];
	echo $tipo;
	require_once 'lacolmenadata/conexion.php';
	$insert_query = "INSERT INTO noticias (titulo,fecha,estado,descripcion,imagen ) VALUES ('$titulo','$fecha','$estado','$descripcion','$imagen') ";
	//$run= mysqli_query($conn, $insert_query);
	
	if (mysqli_query($conn, $insert_query)) {
		$msg = "Información Subida";
		
		$title = "";
		$post_data = "";
		$path = "img/not/$imagen";
		if (move_uploaded_file($tmp_name, $path)) {
			copy($path, "../$path");
		}
	} else {
		$error = "Información no añadida";
	}

	$msg="Noticia Agragada";
	header("Location: admin_ingnot_form.php?msg=$msg");

?>