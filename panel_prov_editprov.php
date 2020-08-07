

<?php 

	//include_once 'user.php';
	//include_once 'user_session.php';

	//$userSession = new UserSession();
	//$user = new User(); 

	$nombre_local =  $_POST['nombre_local'];
	$direccion =  $_POST['direccion'];
	$hora_apertura =  $_POST['hora_apertura'];
	$hora_cierre =  $_POST['hora_cierre'];	
	$nombres =  $_POST['nombres'];
	$correo =  $_POST['correo'];
	$pass =  $_POST['pass'];	
	$logo = $_FILES['logo']['name'];
    $up_tmp_name = $_FILES['logo']['tmp_name'];
    $id =$_POST['idusuario'];
	echo $id;
    require_once 'lacolmenadata/conexion.php';

    if($logo == null){
        
        $insert_query = "UPDATE usuarios SET nombre_local = '$nombre_local', direccion = '$direccion',hora_apertura = '$hora_apertura',hora_cierre = '$hora_cierre',
        nombres='$nombres', correo='$correo', pass='$pass'  where idusuario = $id ";
        $run=mysqli_query($conn, $insert_query);
    }else
    {
        $insert_query = "UPDATE usuarios SET nombre_local = '$nombre_local', direccion = '$direccion',hora_apertura = '$hora_apertura',hora_cierre = '$hora_cierre',
        nombres='$nombres', correo='$correo', pass='$pass', logo='$logo'   where idusuario = $id ";
	//$run= mysqli_query($conn, $insert_query);
        if(mysqli_query($conn, $insert_query)){
            $msg = "Post ha sido actualizado";
            $path = "img/prov/$logo";
            //header("location: edit-post.php?edit=$edit_id");
            if(!empty($logo)){
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

	
		

	header('Location: panel_prov_editprov_form.php',$id);

?>