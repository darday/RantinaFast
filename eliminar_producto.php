
<?php
	$id=$_REQUEST['id'];
	try{
    require_once('lacolmenadata/conexion.php');
    $sql="DELETE FROM producto WHERE id_producto = '$id'";
    $result=$conn->query($sql);
	}
	catch(Exception $e){
		$error = $e->getMessage();
	}
  header("location: ../index.php");

?>