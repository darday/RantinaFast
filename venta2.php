
<?php

$id = $_REQUEST["ide"];

try{
    require_once('lacolmenadata/conexion.php');
    $sql="select * FROM producto WHERE id_local = '$id'";
    $result=$conn->query($sql);
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
    <title>Carrito Compras</title>
</head>

<body>

    <header>
        <div class="container">
            <div class="row align-items-stretch justify-content-between">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <a class="navbar-brand" href="venta.php">RANTINA FAST</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                   
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <img src="img/cart.jpeg" class="nav-link dropdown-toggle img-fluid" height="70px"
                                    width="70px" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"></img>
                                <div id="carrito" style="width:400px; height:300px; overflow: auto;" class="dropdown-menu" aria-labelledby="navbarCollapse">
                                    <table id="lista-carrito" class="table">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
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
                </nav>
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
                  <th>#</th>
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
                          <td>%s</td>
                          <td><h6>%s</h6></td>
                          <td><h5 class='card-title pricing-card-title'> <span class=''>%s</span></h5></td>
                          <td><h5 class='card-title pricing-card-title precio'> <span class=''>%s</span></h5></td>
                          <td><a href='' class='btn btn-block btn-primary agregar-carrito' data-id='%s'>Añadir al carrito</a></td>
                          </tr>
                          ",$i,$row["nombre_producto"],$row["medida"],$row["precio"],$row["id_producto"],$id);
       
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