
<?php
	$id=$_GET['id'];
	try{
    require_once('lacolmenadata/conexion.php');
    $sql="DELETE FROM categoria WHERE id_cat = '$id'";
    $result=$conn->query($sql);
	}
	catch(Exception $e){
		$error = $e->getMessage();
	}
  header("location: index.php");

?>