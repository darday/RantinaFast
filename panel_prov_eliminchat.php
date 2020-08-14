<?php

$resp=$_POST['resp'];

$correo=$_POST['correo'];

echo $correo;
echo $resp;
require_once 'lacolmenadata/conexion.php';

$insert_query = "DELETE from pedido ";
$run = mysqli_query($conn, $insert_query);
$msg = "Información Subida";


/*** */

header("Location: panel_prov_listlistcomp.php");


//echo ("programame!!");