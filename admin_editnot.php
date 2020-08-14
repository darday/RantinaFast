

<?php 


$titulo =  $_POST['titulo'];
$fecha =  $_POST['fecha'];
$estado =  $_POST['estado'];
$descripcion =  $_POST['descripcion'];	
$imagen = $_FILES['imagen']['name'];
$up_tmp_name = $_FILES['imagen']['tmp_name'];

$id_not =$_POST['id_not'];
echo $id_not;
require_once 'lacolmenadata/conexion.php';

if($imagen == null){
	
	$insert_query = "UPDATE noticias SET titulo = '$titulo', fecha = '$fecha',estado = '$estado',descripcion = '$descripcion'
	 where id_noticia = $id_not ";
	$run=mysqli_query($conn, $insert_query);
}else
{
	$insert_query = "UPDATE noticias SET titulo = '$titulo', fecha = '$fecha',estado = '$estado',descripcion = '$descripcion',
	imagen='$imagen'  where id_noticia = $id_not ";
//$run= mysqli_query($conn, $insert_query);
	if(mysqli_query($conn, $insert_query)){
		$msg = "Post ha sido actualizado";
		$path = "img/not/$imagen";
		//header("location: edit-post.php?edit=$edit_id");
		if(!empty($imagen)){
				if(move_uploaded_file($up_tmp_name, $path)){
				copy($path, "../$path");
			}
		}
	}
	else{
		$error = "Post no ha sido actualizado";
	}    



	/*if (mysqli_query($conn, $insert_query)) {
		$msg = "Información Subida";
		
		$title = "";
		$post_data = "";
		$path = "img/prov/$logo";
		if (move_uploaded_file($tmp_name, $path)) {
			copy($path, "../$path");
		}
	} else {
		$error = "Información no añadida";
	}*/
}


	

header('Location: admin.php'	);

?>