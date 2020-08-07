<?php
$bodegax=$_POST['bodega'];
$fecha=$_POST['fecha'];
$op=$_POST['op'];
$id=$_POST['id'];

 if($op == 1){
   
  try{
    require_once('lacolmenadata/conexion.php');
    $sql="select * from categoria where id_cat='$id'";
    $result=$conn->query($sql);
    $row = $result->fetch_array();
    $suma = $row['bodega'] + $bodegax;
    $sql2="UPDATE categoria SET bodega='$suma' where id_cat='$id'";
    $result2=$conn->query($sql2);

    $sql3="insert into modifi_bodega (fecha, accion, cantidad, id_cat) values ('$fecha','Agregar', '$bodegax', '$id')";
    $result3=$conn->query($sql3);
  }
  catch(Exception $e){
    $error = $e->getMessage();
  }
 }else{
  try{
    
    require_once('lacolmenadata/conexion.php');
    $sql="select * from categoria where id_cat='$id'";
    $result=$conn->query($sql);
    $row = $result->fetch_array();
    $resta = $row['bodega'] - $bodegax;

    if($bodegax >= $row['bodega']){
      $resta = 0;
    }
    $sql2="UPDATE categoria SET bodega='$resta' where id_cat='$id'";
    $result2=$conn->query($sql2);

    $sql3="insert into modifi_bodega (fecha, accion, cantidad, id_cat) values ('$fecha','Quitar','$bodegax', '$id')";
    $result3=$conn->query($sql3);
  }
  catch(Exception $e){
    $error = $e->getMessage();
  }
 }
  header("location: index.php");
?>
