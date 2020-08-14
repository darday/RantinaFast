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

//echo $row['idusuario'];

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administración</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
	<link rel="icon" type="image/png" href="img/icono/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" type="text/css" href="css/rantinaStyle.css">

  

</head>
<body>
	<header class="verdeoscuro">
		<?php include_once 'components/header_prov.php'; ?>

	</header>

	<div class="container">
			<section class="main row">
				<aside class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<?php include_once 'components/sidebar.php'; ?>
				</aside>

				<article id="contenidodinamico" class=" col-xs-12 col-sm-8 col-md-9 col-lg-9 ">
        <div class="card text-center">
    <BR>
  <div class="wrap-input100  m-b-26 text-center" data-validate="Campo Obligatorio">
			<h1>CHAT DE COMPRA</h1>
  </div>
  <div class="card-body text-center">
      <?php



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
              
  </div>
              
    <nav class="navbar navbar-light bg-light ">
    <form class="form-inline" style="width: 100%; " action="panel_prov_respchat.php" method="POST">
      <input class="form-control mr-sm-2" name="resp"  style="width: 100%;" type="search" placeholder="Responder" aria-label="Search">
      <input type="hidden" name="correo" value="<?php  echo $usua ?>">

      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Enviar</button>

      <a href="panel_prov_eliminchat.php">

       <button type="button" class="btn btn-secondary">Finalizar</button>

      </a>
    </form>
</nav>
</div>
				</article>
			</section>
	</div>
	
	<?php include_once 'components/footer.php'; ?>

	


















<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script src="css/jsindex.js"></script>
<script>    
$(document).ready( function () {
    $('#tabla').DataTable({
        language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    });
} );
</script>

  

</body>
</html>

