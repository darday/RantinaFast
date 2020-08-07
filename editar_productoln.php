<?php
$nombre=$_POST['nombre'];
$descrip=$_POST['contenido'];
$precio=$_POST['precio'];
$preciopr=$_POST['preciopr'];
$idcat=$_POST['cate'];
$id=$_POST['id'];

  try{
    require_once('lacolmenadata/conexion.php');
    $sql="UPDATE producto SET nombre_producto='$nombre', descripcion='$descrip', precio='$precio', precio_pr='$preciopr', id_cat='$idcat' where id_producto='$id'";
    $result=$conn->query($sql);
  }
  catch(Exception $e){
    $error = $e->getMessage();
  }
  header("location: index.php");
?>
