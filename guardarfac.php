<?php

require_once('lacolmenadata/conexion.php');
session_start();

$nombre = $_POST['cliente'];    
$cedula = $_POST['cedula'];
$direc = $_POST['direccion'];
$tlf = $_POST['telefono'];
$monto = $_POST['monto'];
$fecha = $_POST['fecha'];
$cantidadn = $_POST['cantidadn'];
$idn = $_POST['idn'];
$nombre_producto = $_POST['producton'];
$estado = 0;
$corr = $_POST['mail'];

try{
    $aux = $_SESSION['user'];
    $sql="select * from usuarios where correo = '$aux'";
    $result=$conn->query($sql);
    $_r = $result->fetch_array();
    $idclie = $_r['idusuario'];
    $sql1="INSERT INTO factura (id_cliente, total, fecha, estado, direccion, telefono, local) values ('$idclie', '$monto', '$fecha', '$estado', '$direc', '$tlf', '$corr')";
    $result1=$conn->query($sql1);
    $result2 = $conn->query("SELECT * FROM factura
	 ORDER BY id_factura DESC LIMIT 1");
     $row = $result2->fetch_array();
     $auxidfac = $row['id_factura'];
    }
    catch(Exception $e){
        $error = $e->getMessage();
    }

for($i = 0; $i < count($idn); ++$i){
    $auxid = $idn[$i];
    $auxcant = $cantidadn[$i];
    $auxnom = $nombre_producto[$i];
    $auxprecio = $precio[$i];
    try{
        $sql3="INSERT INTO venta (id_factura, id_producto, cantidad) values ('$auxidfac','$auxid', '$auxcant')";
        $result3=$conn->query($sql3);

        }
        catch(Exception $e){
            $error = $e->getMessage();
        }
}

$conn->close();

header("location: indexlog.php");

?>
