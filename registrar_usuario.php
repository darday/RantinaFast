<?php
//require_once('lacolmenadata/conexion.php');


$nombres = $_POST['nombres'];
$ci = $_POST['ci'];
$pass = $_POST['pass'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$tipo = $_POST['tipo'];
echo $username;
require_once 'lacolmenadata/conexion.php';

$insert_query = "INSERT INTO usuarios(nombres, ci, pass, telefono, correo, direccion, tipo) 
values ('$nombres', '$ci','$pass', '$telefono','$correo','$direccion','$tipo')";
$run = mysqli_query($conn, $insert_query);



header("location: indexlog.php");
