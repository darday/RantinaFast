
<?php

    
session_start();
require_once('user.php');
require_once('user_session.php');
$correo=$_SESSION['user'];
	if(!isset($_SESSION['user'])){
		session_unset();
        session_destroy();
		header('location: index.php');
	}

    include_once 'user.php';
    include_once 'user_session.php';
     
    $correo=$_SESSION['user'];

        if(!isset($_SESSION['user'])){
            session_unset();
            session_destroy();
            header('location: index.php');
        }

    require_once ('lacolmenadata/conexion.php');

    $id_query = "Select * from usuarios where correo='$correo'";
    $run = mysqli_query($conn, $id_query);
    $row = mysqli_fetch_array($run);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/tablaloca.css">
    <link rel="stylesheet" type="text/css" href="css/rantinaStyle.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css"> 
    <link rel="stylesheet" href="chat.css"> 

    <title>Carrito Compras</title>
</head>
<body>
<header>
        <div class="container ">
            


        
            <div class="row align-items-stretch justify-content-between ">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top  verdeoscuro">
                    <a class="navbar-brand" href="venta.php">RANTINA FAST</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                   
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <img src="img/lista.png" class="nav-link dropdown-toggle img-fluid" height="70px"
                                    width="70px" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"></img>
                                <div id="formulario" style="width:400px; height:300px; overflow: auto;" class="dropdown-menu" aria-labelledby="navbarCollapse">
                                <tr>
                                <form method="post" id="myform">
                                <div class="card-header">Haga su pedido aquí</div>
                                  
                                    </tr>
                                    <textarea id="pedidor" cols="45" rows="8" name="pedidor"> </textarea>
                                    <input type="hidden" name="estado" value="0">
                                    <a id="btn1" class="btn btn-danger">Solicitar Compra</a>
                                </form>                                     
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <img src="img/rantina.png" class="nav-link dropdown-toggle img-fluid" height="70px"
                                    width="70px" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"></img>
                                <div id="formulario" style="width:400px; height:300px; overflow: auto;" class="dropdown-menu" aria-labelledby="navbarCollapse">

                                    <div class="row">
                                        <form id="msg_form">
                                            <th>
                                                <tr><textarea style = "width: 80%;" name="pedidor"  style="bottom:initial" > </textarea><button type="submit">></button></tr>
                                                <button type="submit" class="btn btn-success">INGRESAR</button> 

                                            </th>                                  
                                        </form>

                                    </div>
                                    
                                <?php 
                                    require_once ("config.php");
                                ?>
                                    <div class="row">
                                        <div class='msgs'>
                                            <br>
                                            <br>
                                            <br>
                                            <p><?php require_once ("msgs.php");?></p>
                                        </div>

                                    </div>
                                    
                                </div>
                            </li>
                        </ul>
                    </div>

                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
            <h1 class="display-4 mt-4">Lista de Locales</h1>
        </div>

        <div class="container" id="lista-productos">

          <div class="card text-center">
            <div class="card-body text-center">
                 <?php
                    try{
                    require_once ('lacolmenadata/conexion.php');
                    $sql = "select * from usuarios where tipo = 2";
                    $result = $conn->query($sql);
                     }
                    catch (Exception $e){
                    $error= $e->getMessage();
                    }
                    ?>
                    <table class="display" id="tabla" style="font-size: 13px ">
                    
                    <thead>
                    <tr>
                  <th>#</th>
                  <th>Local</th>
                  <th>Atención</th>
                  <th>Cierre</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  
                  $i = 0;
                  while($row = $result->fetch_array()) {
                  if ($row != null) {
                      $i = $i + 1;
                   printf("
                          <tr>
                          <td>%s</td>
                          <td><a href=\"venta2.php?ide=%d\" style='color: #007AC5;'>%s</a></td>
                          <td><h5 class='card-title pricing-card-title'> <span class=''>%s</span></h5></td>
                          <td><h5 class='card-title pricing-card-title'> <span class=''>%s</span></h5></td>
                         </tr> 
                          ",$i,$row["idusuario"],$row["nombre_local"],$row["hora_apertura"],$row["hora_cierre"]);
       
                          }
                       }
                        $result->close();
                        $conn->close();
                  ?>
              </tbody>
             </table>
            </div>
             </div>
                
               

                


        </div>
    </main>
    
    <script src="popper/popper.min.js"></script>	 	 	
         	 
        <script src="jquery/jquery-3.3.1.min.js"></script>	 	
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="chat.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script>    
localStorage.clear();
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
<script src="codigo.js"></script>
    <script src="plugins/toastr/toastr.min.js"></script>
</body>

</html>