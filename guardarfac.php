<?php
require_once('lacolmenadata/conexion.php');

$nombre = $_POST['cliente'];    
$cedula = $_POST['cedula'];
$monto = $_POST['monto'];
$fecha = $_POST['fecha'];
$cantidadn = $_POST['cantidadn'];
$idn = $_POST['idn'];
$nombre_producto = $_POST['producton'];
$categoria = $_POST['categorian'];
$precio = $_POST['precion'];

try{
    $sql="INSERT INTO cliente (nombres, ci) values ('$nombre', '$cedula')";
    $result=$conn->query($sql);
    $sql1="INSERT INTO factura (id_cliente, total, fecha) values ('$cedula', '$monto', '$fecha')";
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

        $sqlx1="select * from producto where nombre_producto='$auxnom'";
        $resultx1=$conn->query($sqlx1);
        $rowx1 = $resultx1->fetch_array();
        $auxcat = $rowx1['id_cat'];

        $ganancia = $auxcant*($auxprecio - $rowx1['precio_pr']);
        $sqlg="insert into ganancias (id_factura, ganancia) values ('$auxidfac', '$ganancia')";
        $resultg=$conn->query($sqlg);


        $sqlx="select * from categoria where id_cat='$auxcat'";
        $resultx=$conn->query($sqlx);
        $rowx = $resultx->fetch_array();
        $resta = $rowx['bodega'] - $auxcant;

        $sql4="UPDATE categoria SET bodega='$resta' where id_cat='$auxcat'";
        $result4=$conn->query($sql4);

        $sql5="insert into modifi_bodega (fecha, accion, cantidad, id_cat) values ('$fecha','Venta','$auxcant', '$auxcat')";
        $result5=$conn->query($sql5);
        unset($auxcant);
        unset($result3);
        }
        catch(Exception $e){
            $error = $e->getMessage();
        }
}

$conn->close();

header("location: venta.php");

?>
