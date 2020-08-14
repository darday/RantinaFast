<?php

session_start();
require_once('user.php');
require_once('user_session.php');
$correo=$_SESSION['user'];
	if(!isset($_SESSION['user'])){
		session_unset();
        session_destroy();
		header('location: indexlog.php');
	}

require_once ('lacolmenadata/conexion.php');

$id_query = "Select * from usuarios where correo='$correo'";
$run = mysqli_query($conn, $id_query);
$row = mysqli_fetch_array($run);

      $correo=$_SESSION['user'];
      //echo $correo;
              try{
                  require_once ('lacolmenadata/conexion.php');
                  $id_query = "Select * from usuarios where correo='$correo'";
                  $run = mysqli_query($conn, $id_query);
                  $row = mysqli_fetch_array($run);
                  $id_user=$row['idusuario'];

                  $sql = "SELECT * FROM pedido ORDER BY id_pedido asc ";
                  $result = $conn->query($sql);

                  
              }
              catch (Exception $e){
                  $error= $e->getMessage();
              }
              ?>
             
              <?php
              $i = 0;
              while($row2 = $result->fetch_array()) {           
                
                
                $usua = $row2["correo_usuario"];
                $ped = $row2["pedido"];
                //echo $local;
                
                if($usua != null){
                ?>

                  <div class="alert alert-success text-left" role="alert">
                      <?php echo $ped;?>
                  </div>

          <?php }else{?>

                   <div class="alert alert-secondary" role="alert">
                      <?php echo $ped;?>
                  </div>


                 <?php }

                  ?>
                  
                  <?php

                
              }
              
              $result->close();
              $conn->close();
          ?>