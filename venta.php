
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
    <title>Locales Comerciales</title>
</head>

<body>

    <header>
        <div class="container">
            <div class="row align-items-stretch justify-content-between">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <a class="navbar-brand" href="#">RANTINA FAST</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                   
                    
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

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
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

</body>

</html>