<?php


$nombre=$_POST['nombre'];
$descrip=$_POST['contenido'];
$precio=$_POST['precio'];
$preciopr=$_POST['preciopr'];
$idcat=$_POST['cate'];


	try{
	require_once('lacolmenadata/conexion.php');
    $sql="insert into producto (nombre_producto, descripcion, precio, id_cat, precio_pr) values ('$nombre','$descrip', '$precio', '$idcat', '$preciopr')";
    $result=$conn->query($sql);
	}
	catch(Exception $e){
		$error = $e->getMessage();
	}
	header("Location: index.php");
?>
