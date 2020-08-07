<?php

$nombre_producto=$_POST['nombre_producto'];
$medida=$_POST['medida'];
$precio=$_POST['precio'];
$id_local=$_POST['id_local'];
$id_tipo=$_POST['id_tipo'];
$id_producto=$_POST['id_producto'];

require_once 'lacolmenadata/conexion.php';

$insert_query = "UPDATE producto SET nombre_producto = '$nombre_producto', medida = '$medida',precio = '$precio',id_local = '$id_local',
        id_tipo='$id_tipo' where id_producto = $id_producto ";
        $run=mysqli_query($conn, $insert_query);

header("location: panel_prov.php");


echo ("programame!!");