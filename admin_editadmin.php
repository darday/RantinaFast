

<?php 


$nombres =  $_POST['nombres'];
$ci=$_POST['ci'];
$correo =  $_POST['correo'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$pass =  $_POST['pass'];	
$id_clien =$_POST['id_clien'];
echo $id_clien;
require_once 'lacolmenadata/conexion.php';

$insert_query = "UPDATE usuarios SET nombres='$nombres', ci='$ci', correo='$correo', direccion='$direccion', telefono='$telefono', pass='$pass'  where idusuario = '$id_clien' ";
$run=mysqli_query($conn, $insert_query);
$msg='Información Actualizado';
header("Location: admin.php");

?>