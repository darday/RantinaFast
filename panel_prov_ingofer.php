<?php

$nombre_producto=$_POST['nombre_producto'];
$medida=$_POST['medida'];
$precio=$_POST['precio'];
$id_local=$_POST['id_local'];
$id_tipo=$_POST['id_tipo'];


require_once 'lacolmenadata/conexion.php';

$insert_query = "INSERT INTO producto(nombre_producto, medida, precio, id_local,id_tipo) 
values ('$nombre_producto', '$medida','$precio', '$id_local','$id_tipo')";
$run = mysqli_query($conn, $insert_query);



header("location: panel_prov.php");


echo ("programame!!");