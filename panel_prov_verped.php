<?php


$id_fact= $_POST["idfact"];
echo $id_fact;
require_once 'lacolmenadata/conexion.php';

$insert_query = "UPDATE factura SET estado = 1 where id_factura = $id_fact";
        $run=mysqli_query($conn, $insert_query);

header("location: panel_prov.php");


echo ("programame!!");