<?php


$del=$_GET['del'];
echo $del;
require_once 'lacolmenadata/conexion.php';

$query = "DELETE FROM producto WHERE id_producto = $del";
        $run=mysqli_query($conn, $query);

$mdel="Producto Eliminado";
header("location: panel_prov.php?mdel=$mdel");


echo ("programame!!");