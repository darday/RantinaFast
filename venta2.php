<?php

$id = $_GET["ide"];
session_start();
try{
    require_once('lacolmenadata/conexion.php');
    $sql="select * FROM producto WHERE id_local = '$id'";
    $result=$conn->query($sql);
    $sql1="select * FROM usuarios WHERE idusuario = '$id'";
    $result1=$conn->query($sql1);
    $_r = $result1->fetch_assoc();
    $_SESSION['mail']=$_r['correo'];
    
}catch(Exception $e){
    $error = $e->getMessage();
}

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
    <!--Rantina Style-->
	<link rel="stylesheet" type="text/css" href="css/rantinaStyle.css">

    <title>Carrito Compras</title>
</head>

<body>

    <header class="verdeoscuro">
    <div class="container  ">
			<div class="row text-center">
				<div class=" col-xs-6 col-sm-6 col-md-1 col-lg-1 ">
					<img  src="img/rantina.png " style="margin-top: 7px;" width="185px" height="77px">				
				</div>				


				<div class=" col-xs-3 col-sm-3 col-md-8 col-lg-8  text-center">
                    <div class="" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="">
                                <img src="img/cart.jpeg" class="" height="70px"
                                    width="70px" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"></img>
                                <div id="carrito" style="width:400px; height:300px; overflow: auto;" class="dropdown-menu" aria-labelledby="navbarCollapse">
                                    <table id="lista-carrito" class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>

                                        <tbody>                                        
                                        
                                        </tbody>
                                    </table>
                                    <a href="#" id="vaciar-carrito" class="btn btn-primary">Vaciar Carrito</a>
                                    <a href="#" id="procesar-pedido" class="btn btn-danger">Procesar
                                        Compra</a>
                                    
                                </div>
                            </li>
                        </ul>
                    </div>
                

                </div>
                

				
				<div class=" col-xs-12 col-sm-12 col-md-3 col-lg-3   text-center">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h6><?php date_default_timezone_set('America/Bogota');
						echo "Riobamba, " . date("j") . " del " . date("n") . " de " . date("Y");?></h6>
					</div>

					<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						<h6 >Salir</h6><a href="logout.php" title="Salir" class="btn_salir"><i class="fas fa-sign-out-alt" style="font-size:36px;"></i></a>
					</div>


				</div>
			</div>
</div>  


    </header>

    <main>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
            <h1 class="display-4 mt-4">Lista de Productos</h1>
        </div>

        <div class="container" id="lista-productos">

          <div class="card text-center">
            <div class="card-body text-center">
                    <table class="display" id="tabla" style="font-size: 13px ">
                    
                    <thead>
                    <tr>
                  <th>Nombre</th>
                  <th>Presentación</th>
                  <th>Precio($)</th>
                  <th>Compra</th>
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
                          <td><h6>%s</h6></td>
                          <td><h5 class='card-title pricing-card-title'> <span class=''>%s</span></h5></td>
                          <td><h5 class='card-title pricing-card-title precio'> <span class=''>%s</span></h5></td>
                          <td><a href='' class='btn btn-block btn-primary agregar-carrito' data-id='%s'>Añadir al carrito</a></td>
                          </tr>
                          ",$row["nombre_producto"],$row["medida"],$row["precio"],$row["id_producto"],$id);
       
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

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="js/carrito.js"></script>
    <script src="js/pedido.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
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