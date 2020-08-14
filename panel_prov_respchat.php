<?php

$resp=$_POST['resp'];

$correo=$_POST['correo'];

echo $correo;
echo $resp;
require_once 'lacolmenadata/conexion.php';

$insert_query = "INSERT INTO pedido(pedido,local) 
values ( '$resp','$correo')";
$run = mysqli_query($conn, $insert_query);
$msg = "Información Subida";

$query = "UPDATE pedido SET estado = 1" ;

$run2 = mysqli_query($conn, $query);





/*** */

header("Location: panel_prov_listlistcomp.php");


//echo ("programame!!");