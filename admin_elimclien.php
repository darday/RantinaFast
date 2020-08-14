<?php


$del=$_GET['del'];
echo $del;
require_once 'lacolmenadata/conexion.php';

$query = "DELETE FROM usuarios WHERE idusuario = $del";
        $run=mysqli_query($conn, $query);

header("location: admin.php");


//echo ("programame!!");