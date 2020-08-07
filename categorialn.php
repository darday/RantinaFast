<?php


$nombre=$_POST['nombre'];
$bodega=$_POST['bodega'];


	try{
	require_once('lacolmenadata/conexion.php');
    $sql="insert into categoria (nombre_cat, bodega) values ('$nombre','$bodega')";
    $result=$conn->query($sql);
	}
	catch(Exception $e){
		$error = $e->getMessage();
	}
	header("Location: index.php");
?>
