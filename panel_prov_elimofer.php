<?php


$del=$_GET['del'];
echo $del;
require_once 'lacolmenadata/conexion.php';

$query = "DELETE FROM producto WHERE id_producto = $del";
        $run=mysqli_query($conn, $query);

header("location: panel_prov.php");


//echo ("programame!!");