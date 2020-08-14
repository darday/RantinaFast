<?php

session_start();
 
$correo=$_SESSION['user'];

	if(!isset($_SESSION['user'])){
		session_unset();
		session_destroy();
		header('location: index.php');
	}


$pedido = $_POST['pedidor'];
$estado = $_POST['estado'];


	try{
	require_once('lacolmenadata/conexion.php');
    $sql="insert into pedido (correo_usuario, pedido, estado) values ('$correo', '$pedido', '$estado')";
    $result=$conn->query($sql);
	}
	catch(Exception $e){
		$error = $e->getMessage();
	}
?>
